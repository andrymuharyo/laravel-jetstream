<?php

namespace App\View\Components\Backend;

use Illuminate\View\Component;
use Str;

class Dropdown extends Component
{
    public $id, $name, $label;
    public $options;
    public $withSearch;

    /**
     * Create a new component instance.
     *
     * @param $name
     * @param bool $withSearch
     * @param string $label
     * @param array $options
     */
    public function __construct($name, $withSearch = true, $label = '', $options = [])
    {
        $this->id = Str::uuid();
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
        $this->withSearch = $withSearch;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.backend.dropdown');
    }
}
