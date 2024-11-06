<?php

namespace App\Providers;

use App\Interfaces\StatutPermissionInterface;
use App\Repositories\StatutPermissionRepository;
use Illuminate\Support\ServiceProvider;

class StatutPermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(StatutPermissionInterface::class, StatutPermissionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
