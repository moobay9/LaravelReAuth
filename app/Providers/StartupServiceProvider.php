<?php

namespace Funaffect\LaravelReAuth\Providers;

use Illuminate\Support\ServiceProvider;
use Funaffect\LaravelReAuth\Http\Middleware\RedirectIfReAuthenticated;

class StartupServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        // $this->app->singleton('Illuminate\Session\Middleware\StartSession');
    }


    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // dump('Funaffect Laravel Reauth Package!');

        // Config
        $this->publishes([
            __DIR__.'/../../config/reauth.php' => config_path('reauth.php'),
        ], 'reauth');


        $this->publishes([
            __DIR__.'/../Rules/ReAuthCurrentPassword.php' => app_path('Http/Rules/ReAuthCurrentPassword.php'),
        ], 'reauth');


        // Language
        $this->publishes([
            __DIR__.'/../../resouces/lang/' => resource_path('lang'),
        ], 'reauth');


        // Middleware
        $this->app['router']->aliasMiddleware('auth.re-auth', RedirectIfReAuthenticated::class);


        // View
        $this->loadViewsFrom(__DIR__.'/../../resouces/views', 'reauth');


        // Route
        $this->loadRoutesFrom(__DIR__.'/../../routes/reauth.php');
    }

}
