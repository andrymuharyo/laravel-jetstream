<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\NavigationsComposer;
use App\Http\View\Composers\ContactComposer;
use App\Http\View\Composers\LegalsComposer;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'layouts.front', NavigationsComposer::class
        );
        View::composer(
            'layouts.front', ContactComposer::class
        );
        View::composer(
            'layouts.front', LegalsComposer::class
        );
    }
}
