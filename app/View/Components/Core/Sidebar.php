<?php

namespace App\View\Components\Core;

use App\Helpers\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $menu;
    public $permissions;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
        $this->permissions = Auth::guard('admin')->user()->permission ?? [];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.core.sidebar');
    }
}
