<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

			if(Auth::user() != null && ($request->path() == "register/step1" || $request->path() == "livewire/message/company-form")) {
				return $next($request);
			}

        	if(Auth::user()->info === NULL && Route::is('register.step1') != 1) {
				// Session::flash('message', __('Please fill in your company details'));
				return redirect()->route('register.step1');
			}

			if(Auth::user()->info->company_name) {
				return $next($request);
			} else {
				// Session::flash('message', __('Please fill in your company details'));

				return redirect()->route('register.step1');
			}
        }

        return $next($request);
    }
}
