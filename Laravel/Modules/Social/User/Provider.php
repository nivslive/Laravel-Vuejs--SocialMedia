<?php

namespace Modules\Social\User;

use Illuminate\Support\ServiceProvider;

class Provider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/Database/Migrations');
        $this->loadMigrationsFrom(__DIR__.'/Database/Migrations/UserTheme');
        #$this->loadFactories(__DIR__.'/database/factories');
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        #$this->loadViewsFrom(__DIR__.'/views', 'service');
        #$this->publishes([
        #    __DIR__.'/views' => resource_path('views/vendor/service'),
        #]);
    }
}
