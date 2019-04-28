<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        require_once __DIR__.'/../Helpers/WeekdayHelpers.php';
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
    }
}
