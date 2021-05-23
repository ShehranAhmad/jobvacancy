<?php

namespace App\Providers;

use App\Models\Setting;
use Route;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     *
     *
     */



    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('routeis', function ($expression) {
            return fnmatch($expression, Route::currentRouteName());
        });

        view()->composer('*', function($view){
            $view->with('setting', Setting::pluck('value', 'key')->toArray());
        });

        Paginator::useBootstrap();
    }
}
