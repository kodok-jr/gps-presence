<?php

namespace App\View\Components\Materials;

use Illuminate\View\Component;

class Card extends Component
{
    public $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = null)
    {
        $this->type = $type;
    }

    public function typeRow () {
        if ($this->type == 'center') {
            return 'justify-content-center';
        }

        if ($this->type == 'no-gutters') {
            return 'no-gutters';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.materials.card');
    }
}
