<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.profile', function ($view) {
            $postCount = Auth::user()->posts()->count();
            $orderCount = Auth::user()->orders()->count();
            $rateCount = Auth::user()->rates()->count();

            $view->with('postCount', $postCount)
                 ->with('orderCount', $orderCount)
                 ->with('rateCount', $rateCount);
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}