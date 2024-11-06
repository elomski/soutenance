<?php

namespace App\Providers;

use App\interfaces\PersonnelInterface;
use App\Repositories\PersonnelRepository;
use Illuminate\Support\ServiceProvider;

class PersonnelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PersonnelInterface::class,PersonnelRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
