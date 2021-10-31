<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		$locale = 'en';

		if ( Session::has('applocale')) {
			$locale = Session::get( 'applocale' );
		} else {
			Session::put( 'applocale', 'en' );
		}

		App::setlocale($locale);

		return $next($request);
    }
}
