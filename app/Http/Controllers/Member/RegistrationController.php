<?php namespace App\Http\Controllers\Member;

use Vinkla\Hashids\HashidsManager;
use App\Http\Controllers\Controller as BaseController;
use App\Http\Controllers\SiteController;

use Sentinel\FormRequests\RegisterRequest;
use Sentinel\FormRequests\EmailRequest;
use Sentinel\FormRequests\ResetPasswordRequest;
use Sentinel\Repositories\Group\SentinelGroupRepositoryInterface;
use Sentinel\Repositories\User\SentinelUserRepositoryInterface;
use Sentinel\Traits\SentinelRedirectionTrait;
use Sentinel\Traits\SentinelViewfinderTrait;
use Sentry, View, Input, Event, Redirect, Session, Config;

use App\AudioDisk;
use App\VideoDisk;
use App\Magazine;
use App\Book;

use Cart;


class RegistrationController extends SiteController{

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
        $this->userRepository       = $userRepository;
        $this->groupRepository      = $groupRepository;
        $this->hashids              = $hashids;

        $this->page_data['side_cart'] = Cart::content();
        $this->page_data['side_cart_total'] = Cart::total();
        $this->page_data['cart_count'] = $this->cartCount();


        //Check CSRF token on POST
        $this->beforeFilter('Sentinel\csrf', array('on' => array('post', 'put', 'delete')));
    }

    /**
     * Show the registration form, if registration is allowed
     *
     * @return Response
     */
    public function registration()
    {
        // Is this user already signed in? If so redirect to the post login route
        if (Sentry::check()) {
            return $this->redirectTo('session_store');
        }

        //If registration is currently disabled, show a message and redirect home.
        if ( ! config('sentinel.registration', false)) {
            return $this->redirectTo(['route' => 'home'], ['error' => trans('Sentinel::users.inactive_reg')]);
        }

        // All clear - show the registration form.
        return $this->viewFinder('Member.register')->with($this->page_data);
       
    }

    /**
     * Process a registration request
     *
     * @return Response
     */
    public function register(RegisterRequest $request)
    {
        // Gather input
        $data = Input::all();

        // Attempt Registration
        $result = $this->userRepository->store($data);

        // It worked!  Use config to determine where we should go.
        return $this->redirectViaResponse('member_registration_complete', $result);
    }

    /**
     * Activate a new user
     *
     * @param  int    $id
     * @param  string $code
     *
     * @return Response
     */
    public function activate($hash, $code)
    {
        // Decode the hashid
        $id = $this->hashids->decode($hash)[0];

        // Attempt the activation
        $result = $this->userRepository->activate($id, $code);

        // It worked!  Use config to determine where we should go.
        return $this->redirectViaResponse('member_registration_activated', $result);
    }

    /**
     * Show the 'Resend Activation' form
     *
     * @return View
     */
    function resendActivationForm()
    {
        return $this->viewFinder('Admin.resend');
    }

    /**
     * Process resend activation request
     * @return Response
     */
    public function resendActivation(EmailRequest $request)
    {
        // Resend the activation email
        $result = $this->userRepository->resend(['email' => e(Input::get('email'))]);

        // It worked!  Use config to determine where we should go.
        return $this->redirectViaResponse('member_registration_resend', $result);
    }

    /**
     * Display the "Forgot Password" form
     *
     * @return \Illuminate\View\View
     */
    public function forgotPasswordForm()
    {
        return $this->viewFinder('Admin.forgot');
    }


    /**
     * Process Forgot Password request
     * @return Response
     */
    public function sendResetPasswordEmail(EmailRequest $request)
    {
        // Send Password Reset Email
        $result = $this->userRepository->triggerPasswordReset(e(Input::get('email')));

        // It worked!  Use config to determine where we should go.
        return $this->redirectViaResponse('registration_reset_triggered', $result);

    }

    /**
     * A user is attempting to reset their password
     *
     * @param $id
     * @param $code
     *
     * @return Redirect|View
     */
    public function passwordResetForm($hash, $code)
    {
        // Decode the hashid
        $id = $this->hashids->decode($hash)[0];

        // Validate Reset Code
        $result = $this->userRepository->validateResetCode($id, $code);

        if (! $result->isSuccessful())
        {
            return $this->redirectViaResponse('registration_reset_invalid', $result);
        }

        return $this->viewFinder('Admin.users.reset', [
            'hash' => $hash,
            'code' => $code
        ]);
    }

    /**
     * Process a password reset form submission
     *
     * @param $hash
     * @param $code
     * @return Response
     */
    public function resetPassword(ResetPasswordRequest $request, $hash, $code)
    {
        // Decode the hashid
        $id = $this->hashids->decode($hash)[0];

        // Gather input data
        $data = Input::only('password', 'password_confirmation');

        // Change the user's password
        $result = $this->userRepository->resetPassword($id, $code, e($data['password']));

        // It worked!  Use config to determine where we should go.
        return $this->redirectViaResponse('registration_reset_complete', $result);
    }

}


