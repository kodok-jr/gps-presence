<?php

namespace App\View\Components\Core;

use Illuminate\View\Component;

class Alert extends Component
{
    public $status;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->status = ['success', 'danger', 'info', 'warning'];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.core.alert');
    }
}
