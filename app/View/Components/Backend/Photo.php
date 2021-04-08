<?php

namespace App\View\Components\Backend;

use Illuminate\View\Component;

class Photo extends Component
{
    public  $module;
    public  $label;
    public  $name;
    public  $value;
    public  $id;
    public  $disabled;
    public  $uploaded;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($module ,$label = '', $name, $value = '', $id, $disabled = '',$uploaded = '')
    {
        $this->module   = $module;
        $this->label    = $label;
        $this->name     = $name;
        $this->value    = $value;
        $this->id       = $id;
        $this->disabled = $disabled;
        $this->uploaded = $uploaded;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.backend.photo');
    }
}
