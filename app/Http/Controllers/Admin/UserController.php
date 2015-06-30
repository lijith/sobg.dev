<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as BaseController;
use App\MagazineSubscriber;
use App\Profile;
use App\SubscriptionRates;
use App\User;
use Input;
use Redirect;
use Request;
use Sentinel\FormRequests\ChangePasswordRequest;
use Sentinel\FormRequests\UserCreateRequest;
use Sentinel\FormRequests\UserUpdateRequest;
use Sentinel\Repositories\Group\SentinelGroupRepositoryInterface;
use Sentinel\Repositories\User\SentinelUserRepositoryInterface;
use Sentinel\Traits\SentinelRedirectionTrait;
use Sentinel\Traits\SentinelViewfinderTrait;
use Session;
use Validator;
use View;
use Vinkla\Hashids\HashidsManager;

class UserController extends BaseController {

	/**
	 * Traits
	 */
	use SentinelRedirectionTrait;
	use SentinelViewfinderTrait;

	/**
	 * Constructor
	 */
	public function __construct(
		SentinelUserRepositoryInterface $userRepository,
		SentinelGroupRepositoryInterface $groupRepository,
		HashidsManager $hashids
	) {
		$this->userRepository = $userRepository;
		$this->groupRepository = $groupRepository;
		$this->hashids = $hashids;

		// You must have admin access to proceed
		$this->middleware('sentry.admin');
	}

	/**
	 * Display a paginated index of all current users, with throttle data
	 *
	 * @return View
	 */
	public function index() {
		// Paginate the existing users
		$users = $this->userRepository->all();
		$page = Input::get('page', 1);
		$perPage = 15;
		$offSet = ($page * $perPage) - $perPage;
		$itemsForCurrentPage = array_slice($users, $offSet, $perPage, true);

		// $currentPage = Input::get('page', 1);
		// $pagedData = array_slice($users, $currentPage * $perPage, $perPage);
		$users = new \Illuminate\Pagination\LengthAwarePaginator($itemsForCurrentPage, count($users), $perPage, $page,
			['path' => Request::url(), 'query' => Request::query()]
		);

		return $this->viewFinder('Admin.users.all-users', ['users' => $users]);
	}

	/**
	 * Show the "Create new User" form
	 *
	 * @return View
	 */
	public function create() {
		return $this->viewFinder('Admin.users.create');
	}

	/**
	 * Create a new user account manually
	 *
	 * @return Redirect
	 */
	public function store(UserCreateRequest $request) {
		// Create and store the new user
		$result = $this->userRepository->store(Input::all());

		// Determine response message based on whether or not the user was activated
		$message = ($result->getPayload()['activated'] ? trans('Sentinel::users.addedactive') : trans('Sentinel::users.added'));

		if ($result->isSuccessful()) {

			$new_user_id = $result->getPayload()['user']->id;

			$profile = new Profile(array(
				'user_id' => $new_user_id,
				'dob' => \Carbon\Carbon::now(),
			));

			$profile->save();

			return redirect()->route('sentinel.users.edit.profile', array($this->hashids->encode($new_user_id)))->with('success', 'Member Created');

		} else {
			echo 'username already exsist';
		}
	}

	/**
	 * Show the profile of a specific user account
	 *
	 * @param $id
	 *
	 * @return View
	 */
	public function show($hash) {
		// Decode the hashid
		$id = $this->hashids->decode($hash)[0];

		// Get the user
		$user = $this->userRepository->retrieveById($id);

		$subscription = User::find($user->id)->subscription;

		$subrates['digitals'] = SubscriptionRates::where('type', '=', 'digital')
			->orderBy('period', 'ASC')
			->get();
		$subrates['prints'] = SubscriptionRates::where('type', '=', 'print')
			->orderBy('period', 'ASC')
			->get();

		return $this->viewFinder('Admin.users.show', ['user' => $user, 'subscription' => $subscription, 'subrates' => $subrates]);
	}

	/**
	 * Show the profile of a specific user account
	 *
	 * @param $id
	 *
	 * @return View
	 */
	public function editProfile($hash) {
		// Decode the hashid
		$id = $this->hashids->decode($hash)[0];

		// Get the user
		$user = $this->userRepository->retrieveById($id);
		$profile = User::find($user->id)->profile;
		if ($profile == null) {
			$profile = new Profile(array(
				'user_id' => $id,
				'dob' => \Carbon\Carbon::now(),
			));

			$profile->save();

			return redirect()->route('sentinel.users.edit.profile', array($hash));
		}

		$profile->dob = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $profile->dob)->format('m/d/Y');

		return $this->viewFinder('Admin.users.edit-profile', ['hash' => $hash, 'profile' => $profile]);
	}

	/**
	 * create a users subscription
	 *
	 * @param $id
	 *
	 * @return redirect
	 */
	public function CreateSubscription($hash) {
		$id = $this->hashids->decode($hash)[0];

		$print = 0;
		$digital = 0;
		$digital_end_at = \Carbon\Carbon::now();
		$print_end_at = \Carbon\Carbon::now();
		$active = 0;

		if (Input::has('print')) {
			$print = 1;
			if (Input::get('print-end-date') != '') {
				$print_end_at = \Carbon\Carbon::createFromFormat('m/d/Y', Input::get('print-end-date'));
			}
		}

		if (Input::has('digital')) {
			$digital = 1;
			if (Input::get('digital-end-date') != '') {
				$digital_end_at = \Carbon\Carbon::createFromFormat('m/d/Y', Input::get('digital-end-date'));
			}
		}

		if ($print || $digital) {
			$active = 1;
		}

		$insert_data = array(
			'user_id' => $id,
			'digital' => $digital,
			'print' => $print,
			'active' => 1,
			'digital_ending_at' => $digital_end_at,
			'print_ending_at' => $print_end_at,
		);

		$sub = $subscribers = new MagazineSubscriber($insert_data);
		$subscribers->save();

		return redirect()->route('sentinel.users.show', array($hash))->with('success', 'Subscription Added');
	}
	/**
	 * update a users subscription
	 *
	 * @param $id
	 *
	 * @return redirect
	 */
	public function UpdateSubscription($hash) {
		$id = $this->hashids->decode($hash)[0];

		$print = 0;
		$digital = 0;
		$active = 0;
		$subscribers = MagazineSubscriber::where('user_id', '=', $id)->first();

		$now = \Carbon\Carbon::now();
		$current_digital_end = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $subscribers->digital_ending_at);
		$current_print_end = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $subscribers->print_ending_at);

		if (Input::has('print')) {
			$print = 1;
			$form_print_date = \Carbon\Carbon::createFromFormat('m/d/Y', Input::get('print-end-date'));
			if (!$current_print_end->eq($form_print_date)) {
				$print_end_at = $form_print_date;
			} else {
				$print_end_at = $current_print_end;
			}
			$active = 1;

		} else {
			$print = 0;
			$print_end_at = $current_print_end;
		}

		if (Input::has('digital')) {
			$digital = 1;
			$form_digital_date = \Carbon\Carbon::createFromFormat('m/d/Y', Input::get('digital-end-date'));
			if (!$current_digital_end->eq($form_digital_date)) {
				$digital_end_at = $form_digital_date;
			} else {
				$digital_end_at = $current_print_end;
			}

			$active = 1;

		} else {
			$digital = 0;
			$digital_end_at = $current_print_end;
		}

		$update_data = array(
			'user_id' => $id,
			'digital' => $digital,
			'print' => $print,
			'active' => $active,
			'digital_ending_at' => $digital_end_at,
			'print_ending_at' => $print_end_at,
		);

		MagazineSubscriber::where('user_id', '=', $id)
			->update($update_data);

		return redirect()->route('sentinel.users.show', array($hash))->with('success', 'Subscription Updated');
	}

	/**
	 * Show the profile of a specific user account
	 *
	 * @param $id
	 *
	 * @return View
	 */
	public function StoreProfile($hash) {
		// Decode the hashid
		$id = $this->hashids->decode($hash)[0];

		// Get the user
		$user = $this->userRepository->retrieveById($id);
		$profile = User::find($user->id)->profile;
		$update = array(
			'name' => Input::get('name'),
			'gender' => Input::get('gender'),
			'dob' => \Carbon\Carbon::createFromFormat('m/d/Y', Input::get('dob')),
			'nationality' => Input::get('nationality'),
			'profession' => Input::get('profession'),
			'marital_status' => Input::get('marital-status'),
			'contact_number_1' => Input::get('contact-number-1'),
			'contact_number_2' => Input::get('contact-number-2'),
			'permanent_address_1' => Input::get('permanent-address-line-1'),
			'permanent_address_2' => Input::get('permanent-address-line-2'),
			'permanent_country' => Input::get('permanent-country'),
			'permanent_city' => Input::get('permanent-city'),
			'permanent_state' => Input::get('permanent-state'),
			'contact_address_1' => Input::get('contact-address-line-1'),
			'contact_address_2' => Input::get('contact-address-line-2'),
			'contact_country' => Input::get('contact-country'),
			'contact_city' => Input::get('contact-city'),
			'contact_state' => Input::get('contact-state'),

		);

		$profile->update($update);

		return redirect()->route('sentinel.users.edit.profile', array($hash))->with('success', 'Updated');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  string $hash
	 *
	 * @return Redirect
	 */
	public function edit($hash) {
		// Decode the hashid
		$id = $this->hashids->decode($hash)[0];

		// Get the user
		$user = $this->userRepository->retrieveById($id);

		// Get all available groups
		$groups = $this->groupRepository->all();

		return $this->viewFinder('Admin.users.edit', [
			'user' => $user,
			'groups' => $groups,
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  string $hash
	 *
	 * @return Redirect
	 */
	public function update(UserUpdateRequest $request, $hash) {
		// Gather Input
		$data = Input::all();

		// Decode the hashid
		$data['id'] = $this->hashids->decode($hash)[0];

		// Attempt to update the user
		$result = $this->userRepository->update($data);

		// Done!
		return $this->redirectViaResponse('users_update', $result);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  string $hash
	 *
	 * @return Redirect
	 */
	public function destroy($hash) {
		// Decode the hashid
		$id = $this->hashids->decode($hash)[0];

		// Remove the user from storage
		$result = $this->userRepository->destroy($id);

		return $this->redirectViaResponse('users_destroy', $result);
	}

	/**
	 * Change the group memberships for a given user
	 *
	 * @param $hash
	 *
	 * @return Redirect
	 */
	public function updateGroupMemberships($hash) {
		// Decode the hashid
		$id = $this->hashids->decode($hash)[0];

		// Gather input
		$groups = Input::get('groups');

		// Change memberships
		$result = $this->userRepository->changeGroupMemberships($id, $groups);

		// Done
		return $this->redirectViaResponse('users_change_memberships', $result);
	}

	/**
	 * Process a password change request
	 *
	 * @param  string $hash
	 *
	 * @return redirect
	 */
	public function changePassword(ChangePasswordRequest $request, $hash) {
		// Gather input
		$data = Input::all();
		$data['id'] = $this->hashids->decode($hash)[0];

		// Grab the current user
		$user = $this->userRepository->getUser();

		// Change the User's password
		$result = ($user->hasAccess('admin') ? $this->userRepository->changePasswordWithoutCheck($data) : $this->userRepository->changePassword($data));

		// Was the change successful?
		if (!$result->isSuccessful()) {
			Session::flash('error', $result->getMessage());

			return Redirect::back();
		}

		return $this->redirectViaResponse('users_change_password', $result);
	}

	/**
	 * Process a suspend user request
	 *
	 * @param  string $hash
	 *
	 * @return Redirect
	 */
	public function suspend($hash) {
		// Decode the hashid
		$id = $this->hashids->decode($hash)[0];

		// Trigger the suspension
		$result = $this->userRepository->suspend($id);

		return $this->redirectViaResponse('users_suspend', $result);
	}

	/**
	 * Unsuspend user
	 *
	 * @param  string $hash
	 *
	 * @return Redirect
	 */
	public function unsuspend($hash) {
		// Decode the hashid
		$id = $this->hashids->decode($hash)[0];

		// Trigger the unsuspension
		$result = $this->userRepository->unsuspend($id);

		return $this->redirectViaResponse('users_unsuspend', $result);
	}

	/**
	 * Ban a user
	 *
	 * @param  string $hash
	 *
	 * @return Redirect
	 */
	public function ban($hash) {
		// Decode the hashid
		$id = $this->hashids->decode($hash)[0];

		// Ban the user
		$result = $this->userRepository->ban($id);

		return $this->redirectViaResponse('users_ban', $result);
	}

	/**
	 * Unban a user
	 *
	 * @param string $hash
	 *
	 * @return Redirect
	 */
	public function unban($hash) {
		// Decode the hashid
		$id = $this->hashids->decode($hash)[0];

		// Unban the user
		$result = $this->userRepository->unban($id);

		return $this->redirectViaResponse('users_unban', $result);
	}

	/**
	 * search a user
	 *
	 * @param string $hash
	 *
	 * @return Redirect
	 */
	public function find() {
		$result = null;
		return $this->viewFinder('Admin.users.search-user', ['result' => null]);

	}

	/**
	 * search a user
	 *
	 * @param string $hash
	 *
	 * @return Redirect
	 */
	public function search() {

		$result = array();

		$search_type = Input::get('search-type');

		//validator

		$messages = [
			'email.email' => 'Need Valid email',
		];

		$rules = [
			'email' => 'sometimes|email',
			'search-profile' => 'sometimes|min:5',
		];
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) {
			return redirect()->route('sentinel.users.find')->withErrors($validator);
		} else {
			if ($search_type == 'email') {
				$search = User::where('email', '=', Input::get('email'))
					->with('profile')
					->first();
				array_push($result, $search);

			} elseif ($search_type == 'profile') {
				$search = Profile::search(Input::get('search-profile'))->get();

				if ($search != null) {
					foreach ($search as $user) {
						$rs = User::where('id', '=', $user->user_id)
							->with('profile')
							->first();
						array_push($result, $rs);
					}
				}
			}

			if (!empty($result)) {
				foreach ($result as $key => $user) {

					$result[$key]->id = $this->hashids->encode($user->id);

				}
			}
			//	dd($result);

			return View::make('Admin.users.search-user', ['result' => $result]);
		}

	}

}
