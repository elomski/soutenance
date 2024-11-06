<?php

namespace App\Providers;

use App\Interfaces\TypePermissionInterface;
use App\Repositories\TypePermissionRepository;
use Illuminate\Support\ServiceProvider;

class TypePermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TypePermissionInterface::class, TypePermissionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
