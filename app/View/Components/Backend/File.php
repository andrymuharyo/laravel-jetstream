<?php

namespace App\View\Components\Backend;

use Illuminate\View\Component;

class File extends Component
{
    public  $type;
    public  $module;
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
    public function __construct($type = 'image', $module ,$label = '', $name, $value = '', $id, $disabled = '')
    {
        $this->type     = $type;
        $this->module   = $module;
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
        return view('components.backend.file');
    }
}
