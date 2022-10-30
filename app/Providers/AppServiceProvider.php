<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //URL diforce menjadi HTTPS server
        $this->app['request']->server->set('localhost', 'on');
        // $this->app['request']->server->set('HTTPS', 'on');

        // if (env('APP_ENV') !== 'local') {
        //     URL::forScheme('https');
        // }
    }
}
