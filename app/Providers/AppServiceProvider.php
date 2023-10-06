<?php

namespace App\Providers;

use App\Helpers\Menu;
use App\View\Components\Core\Alert;
use App\View\Components\Core\Footer;
use App\View\Components\Core\Header;
use App\View\Components\Core\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\View\Components\Core\Sidebar;
use Illuminate\Support\Facades\Blade;
use App\View\Components\Materials\Card;
use Illuminate\Support\ServiceProvider;
use App\View\Components\Core\Breadcrumb;
use App\Console\Commands\DataTablesCommand;
use App\View\Components\Materials\DataTables;
use Illuminate\Contracts\Auth\Authenticatable;
    use Illuminate\Contracts\Auth\Access\Gate as GateContract;

class AppServiceProvider extends ServiceProvider
{
    public $gates;

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
    public function boot(GateContract $gate)
    {
        /**
         * Custom command artisan
         */
        if ($this->app->runningInConsole()) {
            $this->commands([
                DataTablesCommand::class
            ]);
        }

        /** Define gates */
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

        // view()->composer('*', function ($view)
        // {
        //     dd(auth()->guard('admin')->user());
        //     if (Auth::guard('admin')->check()) {
        //         if (is_array($this->gates)) {
        //             foreach ($this->gates as $key => $gate) {
        //                 Gate::define($gate, function(Authenticatable $user) use ($gate) {
        //                     dd('$user');
        //                     foreach (auth()->guard('admin')->user()->roles as $key => $role) {
        //                         return in_array($gate, $role->gates);
        //                     }
        //                 });
        //             }
        //         }
        //     }
        // });

        // if (is_array($gates)) {
        //     foreach ($gates as $key => $gate) {
        //         Gate::define($gate, function(Authenticatable $user) use ($gate) {
        //             // dd($gates);
        //             foreach ($user->roles as $key => $role) {
        //                 return in_array($gate, $role->gates);
        //             }
        //         });
        //     }
        // }

        // Gate::define('edit-settings', function (User $user) {
        //     return $user->isAdmin
        //                 ? Response::allow()
        //                 : Response::deny('You must be an administrator.');
        // });



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
