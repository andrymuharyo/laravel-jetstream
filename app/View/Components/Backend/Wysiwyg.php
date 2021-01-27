<?php

namespace App\View\Components\Backend;

use Illuminate\View\Component;
use Str;

class Wysiwyg extends Component
{
    public $name, $id;
    public $value;
    public $configUrl;

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param string $label
     * @param string $value
     * @param int $row
     * @param null|string $id
     * @param string $type
     */
    public function __construct($name = '', $value = '', $id = null, $type = 'default')
    {
        $this->id = $id ?? Str::uuid();
        $this->name = $name;
        $this->value = old($name, $value ?? '');

        if ($type === 'advanced') {
            $this->configUrl = url()->to('modules/') . '/ckeditor/configAdvanced.js';
        } elseif ($type === 'simple') {
            $this->configUrl = url()->to('modules/') . '/ckeditor/configSimple.js';
        } else {
            $this->configUrl = url()->to('modules/') . '/ckeditor/configDefault.js';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.backend.wysiwyg');
    }

}
