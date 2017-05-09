<?php

namespace App\Http\Middleware;

use Closure;

class StepMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $step)
    {
        $hotel = \App\Hotel::findorfail($request->id);
        if ($hotel->step >= $step)
        {
            return $next($request);
        }

        return redirect('hotel/update/'.$request->id);
    }
}