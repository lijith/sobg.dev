<?php namespace App\Http\Middleware\Sentinel;

use Closure, Sentry;
use Illuminate\Contracts\Routing\Middleware;

class SentryAuth implements Middleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if ( ! Sentry::check())
        {
            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                return redirect()->guest(route('member.login'));
            }
        }

        return $next($request);
	}

}
