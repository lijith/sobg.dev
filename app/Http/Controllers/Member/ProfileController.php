<?php namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller as BaseController;
use App\Http\Requests\Member\ProfilePersonalUpdateRequest;
use App\Magazine;
use App\Profile;
use App\User;
use Carbon\Carbon;
use Cart;
use Input;
use Redirect;
use Response;
use Sentinel\FormRequests\ChangePasswordRequest;
use Sentinel\FormRequests\UserUpdateRequest;
use Sentinel\Repositories\Group\SentinelGroupRepositoryInterface;
use Sentinel\Repositories\User\SentinelUserRepositoryInterface;
use Sentinel\Traits\SentinelRedirectionTrait;
use Sentinel\Traits\SentinelViewfinderTrait;
use Session;
use Validator;

class ProfileController extends BaseController {

	/**
	 * Traits
	 */
	use SentinelRedirectionTrait;
	use SentinelViewfinderTrait;

	public $page_data = array(
		'title' => 'Profile',
		'description' => 'SALAGRAMAM Ashram, envisaged and founded by Swami Sandeepananda Giri, is devoted to the understanding and spread of pure Knowledge.The School of Bhagavad Gita is the nucleus of the Ashram.',
		'keywords' => 'Bhagavad Gita, School of Bhagavad Gita, Swami Sandeepananda Giri, Salagram, Chinmayananda, Indian heritage, spiritual,culture, vedas, upanishad, tradition, philosophy, ashram, non-sectarian, camps, retreats, discourses, lectures, satsang, yagnam, gita yagnam, jnana, yatra, sadhana, Kailas - Manasarovar Yatra, Himalaya Darsan',
		'top_level_page' => '',
		'sub_page_active' => '',

	);

	/**
	 * Constructor
	 */
	public function __construct(
		SentinelUserRepositoryInterface $userRepository,
		SentinelGroupRepositoryInterface $groupRepository
	) {
		// DI Member assignment
		$this->userRepository = $userRepository;
		$this->groupRepository = $groupRepository;

		// You must have an active session to proceed
		$this->middleware('sentry.auth');

		if (!Session::has('shipping_charge')) {
			Session::put('shipping_charge', 80);
		}

		$cart_content = Cart::content();

		$this->page_data['side_cart'] = $cart_content;
		$this->page_data['side_cart_total'] = Cart::total();
		$this->page_data['grand_cart_total'] = Cart::total() + Session::get('shipping_charge');
		$this->page_data['cart_count'] = Cart::count();

		if ($this->page_data['cart_count'] == 1) {

			if ($cart_content->first()->options->item_sub_type == 'digital') {
				$this->page_data['grand_cart_total'] = Cart::total();
			}
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function show() {
		// Get the user
		$user = $this->userRepository->retrieveById(Session::get('userId'));

		$this->page_data['user'] = $user;
		$this->page_data['profile'] = User::find(Session::get('userId'))->profile;

		$subscription = User::find(Session::get('userId'))->subscription;

		if ($subscription != null) {

			if ($subscription->active) {

				$sub_end = Carbon::createFromFormat('Y-m-d H:i:s', $subscription->ending_at);
				$today = Carbon::now();

				if ($today->diffInDays($sub_end, false) < 1) {
					$subscription->active = 0;
					$subscription->save();
				}

			}

		}

		$this->page_data['subscription'] = $subscription;

		if ($this->page_data['profile'] != null) {

			$dob = Carbon::createFromFormat('Y-m-d H:i:s', $this->page_data['profile']->dob);

			$this->page_data['profile']->dob = $dob->month . '/' . $dob->day . '/' . $dob->year;

		}

		return $this->viewFinder('Member.show', $this->page_data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @return Response
	 */
	public function update(UserUpdateRequest $request) {
		// Gather Input
		$data = Input::all();
		$data['id'] = Session::get('userId');

		// Attempt to update the user
		$result = $this->userRepository->update($data);

		// Done!
		return $this->redirectViaResponse('profile_update', $result);
	}

	/**
	 * Update profiles personal info.
	 *
	 * @return redirect
	 */
	public function updatePersonal(ProfilePersonalUpdateRequest $request) {
		// Gather Input
		$user_id = Session::get('userId');

		$update = array(
			'name' => Input::get('name'),
			'dob' => Carbon::createFromFormat('m/d/Y', Input::get('dob')),
			'nationality' => Input::get('nationality'),
			'profession' => Input::get('profession'),
			'marital_status' => Input::get('marital-status'),
			'contact_number_1' => Input::get('contact-number-1'),
			'contact_number_2' => Input::get('contact-number-2'),
		);

		Profile::where('user_id', '=', $user_id)
			->update($update);

		// Done!
		return redirect()->route('Member.profile.show');
	}

	/**
	 * Update profiles address.
	 *
	 * @return Response
	 */
	public function updateAddress() {
		// Gather Input
		$user_id = Session::get('userId');

		$data = Input::all();

		$validator = Validator::make($data, [
			'permanent-address-line-1' => 'required|min:6',
			'permanent-address-line-2' => 'required|min:6',
			'permanent-country' => 'required|min:3',
			'permanent-city' => 'required|min:3',
			'permanent-state' => 'required|min:3',
		]);

		$validator->sometimes(['contact-address-line-1', 'contact-address-line-2'], 'required|min:6', function ($input) {

			return ($input->address_same == null) ? true : false;
		});

		$validator->sometimes(['contact-country', 'contact-city', 'contact-state'], 'required|min:3', function ($input) {

			return ($input->address_same == null) ? true : false;
		});

		//if checked copy permanent to contact address
		if (Input::has('address_same')) {
			Input::merge(array(
				'contact-address-line-1' => Input::get('permanent-address-line-1'),
				'contact-address-line-2' => Input::get('permanent-address-line-2'),
				'contact-country' => Input::get('permanent-country'),
				'contact-city' => Input::get('permanent-city'),
				'contact-state' => Input::get('permanent-state'),
			));
		}

		if ($validator->fails()) {

			return redirect()
				->route('Member.profile.show')
				->withInput(Input::all())
				->withErrors($validator);

		} else {

			$update = array(
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
			// Attempt to update the user
			Profile::where('user_id', '=', $user_id)
				->update($update);
		}

		// Done!
		return redirect()->route('Member.profile.show');
	}

	/**
	 * Process a password change request
	 *
	 * @return Redirect
	 */
	public function changePassword(ChangePasswordRequest $request) {
		// Gather input
		$data = Input::all();
		$data['id'] = Session::get('userId');

		// Grab the current user
		$user = $this->userRepository->getUser();

		// Change the User's password
		$result = ($user->hasAccess('admin') ? $this->userRepository->changePasswordWithoutCheck($data) : $this->userRepository->changePassword($data));

		// Was the change successful?
		if (!$result->isSuccessful()) {
			Session::flash('error', $result->getMessage());

			return Redirect::back();
		}

		return $this->redirectViaResponse('Member_change_password', $result);
	}

	/*
	 * View list Magazines
	 *
	 * @return view
	 */
	public function listMagazines($year = null) {

		//find the oldest year of issue

		$oldest = Magazine::take(1)->orderBy('published_at', 'asc')->first();

		$oldest_date = Carbon::createFromFormat('Y-m-d H:i:s', $oldest->published_at)->startOfYear();

		$magazines = array();

		$diffYears = $oldest_date->diffInYears(Carbon::now());

		for ($i = $diffYears; $i >= 0; $i--) {

			$date_range = $oldest_date->copy()->addYears($i);

			$mags = Magazine::whereBetween('published_at', array($date_range, $date_range->copy()->endOfYear()))->get();

			//echo $date_range.' '.$date_range->copy()->endOfYear().'<br />';
			if ($mags->count() > 0) {
				$magazines[$date_range->year] = $mags;
			}

		}

		if ($year == null) {

			$current_year = Carbon::now()->startOfYear();

		} else {

			$current_year = Carbon::create($year, 1, 01, 0, 0, 0);
		}

		$current_year_magazines = Magazine::whereBetween('published_at', array($current_year, $current_year->copy()->endOfYear()))
			->orderBy('published_at', 'desc')
			->get();

		$this->page_data['title'] = 'Piravi Magazine Issues';

		$this->page_data['magazines'] = $magazines;
		$this->page_data['current_year'] = $current_year->year;
		$this->page_data['current_year_magazines'] = $current_year_magazines;

		return $this->viewFinder('Member.magazine-list', $this->page_data);
	}

	/*
	 * View a magazine
	 *
	 *
	 */
	public function showMagazine() {

	}

}
