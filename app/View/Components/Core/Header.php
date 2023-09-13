<?php

namespace App\View\Components\Core;

use App\Helpers\Menu;
use Illuminate\View\Component;

class Header extends Component
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
        $this->permissions = auth()->user()->permission ?? [];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.core.header');
    }
}
