<?php namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller as BaseController;
use Sentinel\FormRequests\ChangePasswordRequest;
use Sentinel\FormRequests\UserUpdateRequest;
use Session, Input, Response, Redirect;
use Sentinel\Repositories\Group\SentinelGroupRepositoryInterface;
use Sentinel\Repositories\User\SentinelUserRepositoryInterface;
use Sentinel\Traits\SentinelRedirectionTrait;
use Sentinel\Traits\SentinelViewfinderTrait;

use Cart;

use App\User;

class ProfileController extends BaseController
{

    /**
     * Traits
     */
    use SentinelRedirectionTrait;
    use SentinelViewfinderTrait;

    public $page_data = array(
        'title' => 'Profile',
        'description' => 'SALAGRAMAM Ashram, envisaged and founded by Swami Sandeepananda Giri, is devoted to the understanding and spread of pure Knowledge.The School of Bhagavad Gita is the nucleus of the Ashram.',
        'keywords' => 'Bhagavad Gita, School of Bhagavad Gita, Swami Sandeepananda Giri, Salagram, Chinmayananda, Indian heritage, spiritual,culture, vedas, upanishad, tradition, philosophy, ashram, non-sectarian, camps, retreats, discourses, lectures, satsang, yagnam, gita yagnam, jnana, yatra, sadhana, Kailas - Manasarovar Yatra, Himalaya Darsan',
        'top_level_page' => 'home',
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
        $this->userRepository  = $userRepository;
        $this->groupRepository = $groupRepository;

        // You must have an active session to proceed
        $this->middleware('sentry.auth');

        if(!Session::has('shipping_charge')){
            Session::put('shipping_charge', 80);
        }

        $cart_content = Cart::content();

        $this->page_data['side_cart'] = $cart_content;
        $this->page_data['side_cart_total'] = Cart::total();
        $this->page_data['grand_cart_total'] = Cart::total() + Session::get('shipping_charge');
        $this->page_data['cart_count'] = Cart::count();

        if($this->page_data['cart_count'] == 1){

            if($cart_content->first()->options->item_sub_type == 'digital'){
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
    public function show()
    {
        // Get the user
        $user = $this->userRepository->retrieveById(Session::get('userId'));

        $this->page_data['user'] = $user;
        $this->page_data['profile'] = User::find(Session::get('userId'))->profile;

        return $this->viewFinder('member.show', $this->page_data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit()
    {
        // Get the user
        $user = $this->userRepository->retrieveById(Session::get('userId'));

        // Get all available groups
        $groups = $this->groupRepository->all();

        return $this->viewFinder('Admin.users.edit', [
            'user' => $user,
            'groups' => $groups
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function update(UserUpdateRequest $request)
    {
        // Gather Input
        $data       = Input::all();
        $data['id'] = Session::get('userId');

        // Attempt to update the user
        $result = $this->userRepository->update($data);

        // Done!
        return $this->redirectViaResponse('profile_update', $result);
    }

    /**
     * Process a password change request
     *
     * @return Redirect
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        // Gather input
        $data       = Input::all();
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

        return $this->redirectViaResponse('profile_change_password', $result);
    }

}
