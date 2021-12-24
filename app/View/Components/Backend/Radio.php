<?php

namespace App\View\Components\Backend;

use Illuminate\View\Component;

class Radio extends Component
{
    public  $label;
    public  $name;
    public  $value;
    public  $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label = '', $name, $value = '', $icon = '',$id)
    {
        $this->label = $label;
        $this->name  = $name;
        $this->value = $value;
        $this->id    = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.backend.radio');
    }
}
