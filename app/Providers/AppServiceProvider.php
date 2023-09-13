<?php

namespace App\Providers;

use App\View\Components\Core\Header;
use App\View\Components\Core\Sidebar;
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
        /**
         * View Components Core
         */
        Blade::component('larapattern-header', Header::class);
        Blade::component('larapattern-sidebar', Sidebar::class);
    }
}
