<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;

class LocaleMiddleware
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
        if (Session::has('locale')) {
            $locale = Session::get('locale');
        }
        else {
            if (geoip()->getLocation($request->ip())['attributes']['iso_code'] == 'MN') {
                $locale = 'mn';
            }
            else {
                $locale = 'en';
            }
            Session::put('locale', $locale);
        }
        
        App::setLocale($locale);

        return $next($request);
    }
}
