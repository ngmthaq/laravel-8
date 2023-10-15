<?php

namespace App\Providers;

use App\Helpers\LogHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class LoggerServiceProvider extends ServiceProvider
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
        DB::listen(function ($query) {
            LogHelper::query($query->sql, [
                'bindings' => $query->bindings,
                'time' => $query->time
            ]);
        });
    }
}
