<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GenerateFilesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            'App\Services\GenerateFiles\GenerateFilesServiceInterface',
            'App\Services\GenerateFiles\GenerateFilesService'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
