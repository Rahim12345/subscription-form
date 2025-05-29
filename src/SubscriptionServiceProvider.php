<?php

namespace RsCode\SubscriptionForm;

use Illuminate\Support\ServiceProvider;

class SubscriptionServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../src/database/migrations/create_subscriptions_table.php' => database_path('migrations/0001_01_01_000000_create_subscriptions_table.php'),
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

        $this->publishes([
            __DIR__ . '/../src/langs/az/rs.php' => base_path('langs/az/rs.php'),
        ], 'langs');

        if (is_dir(resource_path('views/vendor/subscription-form'))) {
            $this->loadViewsFrom(resource_path('views/vendor/subscription-form'), 'subscription');
        }

        if (is_dir(database_path('migrations'))) {
            $this->loadMigrationsFrom(database_path('migrations'));
        }

        if (is_dir(base_path('langs'))) {
            $this->loadTranslationsFrom(base_path('langs'), 'subscription');
        }
    }


    public function register(): void
    {
        $this->commands([
            RsCode\SubscriptionForm\Console\Commands\InstallSubscriptionCommand::class,
        ]);
    }
}
