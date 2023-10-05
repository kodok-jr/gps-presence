<?php

namespace App\View\Components\Materials;

use Illuminate\View\Component;

class DataTables extends Component
{
    public $fields;
    public $options;
    public $buttons;
    public $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($fields, $options, $buttons, $title)
    {
        $this->fields = $fields ?? [];
        $this->options = $options ?? [];
        $this->buttons = $buttons ?? null;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.materials.data-tables');
    }
}
