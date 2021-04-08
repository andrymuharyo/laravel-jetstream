<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Config;
use Str;
use Session;
use Storage;
use Image;
use DB;

class LanguageController extends Controller
{

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   public function index($locale)
   {      
    $locale = mb_strtolower($locale);
    
    App::setLocale($locale);
    if (array_key_exists($locale, Config::get('language'))) {
        Session::put('applocale', $locale);
    }
    
    return redirect()->back();
   }
}
