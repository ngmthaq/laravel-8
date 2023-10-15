<?php

namespace App\Providers;

use App\Repositories\UserRepo;
use App\Repositories\UserRepoInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(
            UserRepoInterface::class,
            UserRepo::class
        );
    }
}
