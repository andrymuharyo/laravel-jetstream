<?php

namespace App\View\Components\Backend;

use Illuminate\View\Component;
use Str;

class Keyword extends Component
{
    public $id, $name, $label;
    public $withSearch;
    public $options;
    public $selected;

    /**
     * Create a new component instance.
     *
     * @param $name
     * @param bool $withSearch
     * @param string $label
     * @param array $options
     */
    public function __construct($name, $label = '', $withSearch = true , $options = [], $selected = '')
    {
        $this->id = Str::uuid();
        $this->withSearch = $withSearch;
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
        $this->selected = $selected;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.backend.keyword');
    }
}
