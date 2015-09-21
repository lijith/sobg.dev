<?php namespace App\Http\Controllers\Member;

use App\Http\Controllers\SiteController;
use App\Http\Requests\CartLoginRequest;
use App\Yatra;
use Cart;
use Config;
use Illuminate\Support\Facades\Response;
use Input;
use Redirect;
use Sentinel\FormRequests\LoginRequest;
use Sentinel\Repositories\Session\SentinelSessionRepositoryInterface;
use Sentinel\Traits\SentinelRedirectionTrait;
use Sentinel\Traits\SentinelViewfinderTrait;
use Sentry;
use Session;

class SessionController extends SiteController {

	/**
	 * Traits
	 */
	use SentinelRedirectionTrait;
	use SentinelViewfinderTrait;

	/**
	 * Constructor
	 */
	public function __construct(SentinelSessionRepositoryInterface $sessionManager) {
		$this->session = $sessionManager;

		//get the yatras
		$yatras = Yatra::select('slug', 'name')
			->get();

		$this->page_data['side_cart'] = Cart::content();
		$this->page_data['side_cart_total'] = Cart::total();
		$this->page_data['cart_count'] = $this->cartCount();
		$this->page_data['school_yatras'] = $yatras;

	}

	/**
	 * Show the login form
	 */
	public function create() {
		// Is this user already signed in?
		if (Sentry::check()) {
			return $this->redirectTo('member_profile');
		}
		dd(Session::all());

		// No - they are not signed in.  Show the login form.
		return $this->viewFinder('Member.login')->with($this->page_data);
	}

	/**
	 * Show form to register/create a account to continue checkout of cart
	 */
	public function cartAccount() {
		// Is this user already signed in?
		if (Sentry::check()) {
			return $this->redirectTo('cart_session_store');
		}

		// No - they are not signed in.  Show the login form.
		return $this->viewFinder('shoppingcart-login-register')->with($this->page_data);
	}
	/**
	 * Attempt authenticate a user login from cart.
	 *
	 * @return Response
	 */
	public function cartStore(CartLoginRequest $request) {
		// Gather the input
		$data = array(
			'email' => Input::get('cart_email'),
			'password' => Input::get('cart_password'),
		);

		// Attempt the login
		$result = $this->session->store($data);

		// Did it work?
		if ($result->isSuccessful()) {
			// Login was successful.  Determine where we should go now.
			if (!config('sentinel.views_enabled')) {
				// Views are disabled - return json instead
				return Response::json('success', 200);
			}
			// Views are enabled, so go to the determined route
			$redirect_route = config('sentinel.routing.cart_session_store');

			return Redirect::intended($this->generateUrl($redirect_route));
		} else {
			// There was a problem - unrelated to Form validation.
			if (!config('sentinel.views_enabled')) {
				// Views are disabled - return json instead
				return Response::json($result->getMessage(), 400);
			}
			Session::flash('error', $result->getMessage());

			return Redirect::route('cart.account')
				->withInput();
		}
	}

	/**
	 * Attempt authenticate a user.
	 *
	 * @return Response
	 */
	public function store(LoginRequest $request) {
		// Gather the input
		$data = Input::all();

		// Attempt the login
		$result = $this->session->store($data);

		// Did it work?
		if ($result->isSuccessful()) {
			// Login was successful.  Determine where we should go now.
			if (!config('sentinel.views_enabled')) {
				// Views are disabled - return json instead
				return Response::json('success', 200);
			}
			// Views are enabled, so go to the determined route
			$redirect_route = config('sentinel.routing.member_profile');

			return Redirect::intended($this->generateUrl($redirect_route));
		} else {
			// There was a problem - unrelated to Form validation.
			if (!config('sentinel.views_enabled')) {
				// Views are disabled - return json instead
				return Response::json($result->getMessage(), 400);
			}
			Session::flash('error', $result->getMessage());

			return Redirect::route('member.session.create')
				->withInput();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return Response
	 */
	public function destroy() {
		$this->session->destroy();

		return $this->redirectTo('member_session_destroy');
	}

}
