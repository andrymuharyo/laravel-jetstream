<?php

namespace App\View\Components\Backend;

use Illuminate\View\Component;

class Action extends Component
{
    public  $id;
    public  $tab;
    public  $confirmArchive;
    public  $confirmDestroy;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($id,$tab = 'index',$confirmArchive,$confirmDestroy)
    {
        $this->id             = $id;
        $this->tab            = $tab;
        $this->confirmArchive = $confirmArchive;
        $this->confirmDestroy = $confirmDestroy;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.backend.action');
    }
}
