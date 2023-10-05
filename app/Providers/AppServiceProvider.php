<?php

namespace App\Providers;

use App\Helpers\Menu;
use App\View\Components\Core\Header;
use App\View\Components\Core\Sidebar;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Console\Commands\DataTablesCommand;
use App\View\Components\Core\Alert;
use App\View\Components\Core\Breadcrumb;
use App\View\Components\Core\Footer;
use App\View\Components\Core\Layout;
use App\View\Components\Materials\Card;
use App\View\Components\Materials\DataTables;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Gate;

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
         * Custom command artisan
         */
        if ($this->app->runningInConsole()) {
            $this->commands([
                DataTablesCommand::class
            ]);
        }

        /**
         * Define gates
         */
        $menu = new Menu;
        $gates = $menu->gates($menu->menus);

        if (is_array($gates)) {
            foreach ($gates as $key => $gate) {
                Gate::define($gate, function(Authenticatable $user) use ($gate) {
                    foreach ($user->roles as $key => $role) {
                        return in_array($gate, $role->gates);
                    }
                });
            }
        }

        /**
         * View Components Core
         */
        Blade::component('larapattern-layout', Layout::class);
        Blade::component('larapattern-header', Header::class);
        Blade::component('larapattern-sidebar', Sidebar::class);
        Blade::component('larapattern-breadcrumb', Breadcrumb::class);
        Blade::component('larapattern-alert', Alert::class);
        Blade::component('larapattern-footer', Footer::class);

        /**
         * View Components Materials
         */
        Blade::component('larapattern-card', Card::class);
        Blade::component('larapattern-datatables', DataTables::class);
    }
}
