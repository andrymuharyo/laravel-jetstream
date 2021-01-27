<?php

namespace App\View\Components\Backend;

use Illuminate\View\Component;

class Datepicker extends Component
{
    public  $label;
    public  $name;
    public  $value;
    public  $id;
    public  $disabled;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = '', $name, $value = '', $id, $disabled = '')
    {
        $this->label    = $label;
        $this->name     = $name;
        $this->value    = $value;
        $this->id       = $id;
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.backend.datepicker');
    }
}
