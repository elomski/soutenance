<?php

namespace App\Providers;

use App\Interfaces\ResponsableRhInterface;
use App\Repositories\ResponsableRhRepository;
use Illuminate\Support\ServiceProvider;

class ResponsableRhServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ResponsableRhInterface::class, ResponsableRhRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
