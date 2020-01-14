<?php

namespace App\Providers;

use Auth;
use Session;
use Request;
use Inertia\Inertia;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Inertia::version(function () {
            return md5_file(public_path('mix-manifest.json'));
        });

        Inertia::share([
            'auth' => function () {
                return [
                    'user' => Auth::check() ? Auth::user()->load('roles') : null,
                    'last_login' => Session::get('last_login')
                ];
            },
            'flash' => function () {
                return Session::pull('flash');
            },
            'errors' => function () {
                return Session::get('errors')
                    ? Session::get('errors')->getBag('default')->getMessages()
                    : (object) [];
            },
            'url' => function () {
                return Request::path();
            },
            'csrf' => function () {
                return csrf_token();
            },
            'local' => function () {
                return app()->environment('local');
            }
        ]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
