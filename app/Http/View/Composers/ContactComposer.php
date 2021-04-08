<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Contact;
use DB;

class ContactComposer
{
    protected $users;

    /**
     * Create a new profile composer.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('contact', Contact::first());
    }
}