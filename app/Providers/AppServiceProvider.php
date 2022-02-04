<?php

namespace App\Providers;

use App\View\Components\AuthLayout;
use App\View\Components\MainLayout;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
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
        Blade::component('auth', AuthLayout::class);
        Blade::component('main', MainLayout::class);
        Paginator::useBootstrap();
    }
}
