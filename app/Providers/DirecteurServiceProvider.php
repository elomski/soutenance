<?php

namespace App\Providers;

use App\Interfaces\DirecteurInterface;
use App\Repositories\DirecteurRepository;
use Illuminate\Support\ServiceProvider;

class DirecteurServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(DirecteurInterface::class, DirecteurRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
