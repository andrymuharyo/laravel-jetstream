<?php

namespace App\View\Components\Backend;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $label, $name;
    public  $value, $row, $id;
    public $disabled;

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param string $label
     * @param string $value
     * @param int $row
     * @param string $id
     */
    public function __construct($name, $label = '', $value = '', $row = 3, $id = '', $disabled = '')
    {
        $this->label    = $label;
        $this->name     = $name;
        $this->value    = old($name, $value ?? '');
        $this->row      = $row;
        $this->id       = $id;
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.backend.textarea');
    }
}
