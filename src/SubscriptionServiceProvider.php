<?php

namespace App;

use Illuminate\Support\ServiceProvider;

class SubscriptionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../src/database/migrations/create_subscriptions_table.php' => database_path('migrations/' . date('Y_m_d_His') . '_create_subscriptions_table.php'),
        ], 'migrations');

        $this->publishes([
            __DIR__ . '/../src/views/form.blade.php' => resource_path('views/vendor/subscription-form/form.blade.php'),
        ], 'views');

        $this->publishes([
            __DIR__ . '/../src/Http/Controllers/RSCODE/SubscriptionController.php' => app_path('Http/Controllers/RSCODE/SubscriptionController.php'),
        ], 'controllers');

        $this->publishes([
            __DIR__ . '/../src/Models/Subscription.php' => app_path('Models/Subscription.php'),
        ], 'models');

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/views', 'subscription');

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }


    public function register()
    {
        $this->commands([
            \App\Console\Commands\InstallSubscriptionCommand::class,
        ]);
    }
}
