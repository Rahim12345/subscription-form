<?php

namespace RsCode\SubscriptionForm;

use Illuminate\Support\ServiceProvider;

class SubscriptionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Migration
        $this->publishes([
            __DIR__ . '/../database/migrations/create_subscriptions_table.php.stub' => database_path('migrations/' . date('Y_m_d_His') . '_create_subscriptions_table.php'),
        ], 'migrations');

        // Views
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/subscription-form'),
        ], 'views');

        // Controller (istəyə bağlı)
        $this->publishes([
            __DIR__ . '/../src/Http/Controllers/SubscriptionController.php' => app_path('Http/Controllers/SubscriptionController.php'),
        ], 'controllers');

        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        // Load views namespace
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'subscription');

        // Load migrations from package (alternativ olaraq)
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }


    public function register()
    {
        //
    }
}
