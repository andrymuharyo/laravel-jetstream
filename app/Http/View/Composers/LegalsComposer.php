<?php

namespace App\Http\View\Composers;


use Illuminate\View\View;
use App\Models\Legal;
use DB;

/**
 * Class NavigationComposer
 *
 * @package App\Http\View\Composers
 */
class LegalsComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('legals', Legal::where('active',1)->descending()->get());
        
    }
}
