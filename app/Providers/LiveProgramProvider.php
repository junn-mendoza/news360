<?php

namespace App\Providers;

use App\Repositories\Live;
use App\Services\LiveService;
use Illuminate\Support\ServiceProvider;

class LiveProgramProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('LiveService', function($app) {
            // Check if parameters are provided, otherwise instantiate without parameters
              // Resolve the LiveService dependency from the container
              $liveService = $app->make('LiveService');
              // Instantiate the Live class and inject the dependency
              return new Live($liveService);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
