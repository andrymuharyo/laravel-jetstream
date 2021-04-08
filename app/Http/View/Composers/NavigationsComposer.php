<?php

namespace App\Http\View\Composers;


use Illuminate\View\View;
use App\Models\Navigation;
use DB;

/**
 * Class NavigationComposer
 *
 * @package App\Http\View\Composers
 */
class NavigationsComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('navigations', Navigation::where('active',1)->where('parent_id',0)->ordering()->get());
        
    }
}
