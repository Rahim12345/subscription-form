<?php

namespace RsCode\SubscriptionForm;

use Illuminate\Support\ServiceProvider;

class SubscriptionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Routes
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        // Views
        $this->loadViewsFrom(__DIR__.'/views', 'subscription');

        // Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    public function register()
    {
        //
    }
}
