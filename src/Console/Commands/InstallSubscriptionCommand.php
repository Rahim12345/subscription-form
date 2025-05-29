<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallSubscriptionCommand extends Command
{
    protected $signature = 'subscription:install';
    protected $description = 'Install the Subscription package (views, migration, controller, routes)';

    public function handle(): void
    {
        // Publish files
        $this->call('vendor:publish', ['--tag' => 'migrations']);
        $this->call('vendor:publish', ['--tag' => 'views']);
        $this->call('vendor:publish', ['--tag' => 'controllers']);
        $this->call('vendor:publish', ['--tag' => 'models']);
        $this->call('vendor:publish', ['--tag' => 'langs']);

        $this->info('Subscription package installed successfully.');
    }
}
