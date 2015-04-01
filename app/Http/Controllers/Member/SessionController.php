<?php namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller as BaseController;
use App\Http\Controllers\SiteController;

use Illuminate\Support\Facades\Response;
use Sentinel\FormRequests\LoginRequest;
use Sentinel\Repositories\Session\SentinelSessionRepositoryInterface;
use Sentinel\Traits\SentinelRedirectionTrait;
use Sentinel\Traits\SentinelViewfinderTrait;
use Sentry, View, Input, Event, Redirect, Session, Config;

use App\AudioDisk;
use App\VideoDisk;
use App\Magazine;
use App\Book;

use Cart;


class SessionController extends SiteController
{

    /**
     * Traits
     */
    use SentinelRedirectionTrait;
    use SentinelViewfinderTrait;

    /**
     * Constructor
     */
    public function __construct(SentinelSessionRepositoryInterface $sessionManager)
    {
        $this->session = $sessionManager;

        $this->page_data['side_cart'] = Cart::content();
        $this->page_data['side_cart_total'] = Cart::total();
        $this->page_data['cart_count'] = $this->cartCount();

    }

    /**
     * Show the login form
     */
    public function create()
    {
        // Is this user already signed in?
        if (Sentry::check()) {
            return $this->redirectTo('session_store');
        }

        // No - they are not signed in.  Show the login form.
        return $this->viewFinder('Admin.login');
    }

    /**
     * Show the login for cart form
     */
    public function cartLogin()
    {
        // Is this user already signed in?
        if (Sentry::check()) {
            return $this->redirectTo('session_store');
        }

        // No - they are not signed in.  Show the login form.
        return $this->viewFinder('shoppingcart-login-register')->with($this->page_data);
    }

    /**
     * Attempt authenticate a user.
     *
     * @return Response
     */
    public function store(LoginRequest $request)
    {
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
            $redirect_route = config('sentinel.routing.session_store');

            return Redirect::intended($this->generateUrl($redirect_route));
        } else {
            // There was a problem - unrelated to Form validation.
            if (!config('sentinel.views_enabled')) {
                // Views are disabled - return json instead
                return Response::json($result->getMessage(), 400);
            }
            Session::flash('error', $result->getMessage());

            return Redirect::route('sentinel.session.create')
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy()
    {
        $this->session->destroy();

        return $this->redirectTo('session_destroy');
    }

}
