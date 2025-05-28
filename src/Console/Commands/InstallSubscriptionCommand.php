<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallSubscriptionCommand extends Command
{
    protected $signature = 'subscription:install';
    protected $description = 'Install the Subscription package (views, migration, controller, routes)';

    public function handle()
    {
        // Publish files
        $this->call('vendor:publish', ['--tag' => 'migrations']);
        $this->call('vendor:publish', ['--tag' => 'views']);
        $this->call('vendor:publish', ['--tag' => 'controllers']);

        // Append routes
        $routeFile = base_path('routes/web.php');
        $stubRoute = __DIR__ . '/../../../routes/web.php';

        if (File::exists($stubRoute)) {
            $routes = File::get($stubRoute);

            if (!str_contains(File::get($routeFile), 'Route::get(\'/subscribe\'')) {
                File::append($routeFile, "\n\n// Subscription Routes\n" . $routes);
                $this->info('Subscription routes appended to routes/web.php.');
            } else {
                $this->warn('Subscription routes already exist in routes/web.php.');
            }
        }

        $this->info('Subscription package installed successfully.');
    }
}
