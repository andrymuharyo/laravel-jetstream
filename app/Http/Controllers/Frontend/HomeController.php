<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Article;
use App\Models\Data;
use App\Models\DataCategory;
use App\Models\Event;
use App\Models\Inquiry;
use App\Models\Legal;
use App\Models\Navigation;
use App\Models\Newsletter;
use App\Models\Overview;
use App\Models\Photo;
use App\Models\Practice;
use App\Models\Slide;
use App\Models\Video;

use Carbon\Carbon;
use Str;
use Storage;
use Image;
use DB;

class HomeController extends Controller
{

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   public function index()
   {      
    $slides         = Slide::where('active',1)->descending()->get();

    foreach($slides as $slide) {
        if(app()->getLocale() == 'en') {
            $slide->title       = $slide->title;
            $slide->description = $slide->description;
            $slide->button      = $slide->button;
            $slide->caption     = $slide->caption;
        } else {
            $slide->title       = ($slide->title_id) ? $slide->title_id : $slide->title;
            $slide->description = ($slide->description_id) ? $slide->description_id : $slide->description;
            $slide->button      = ($slide->button_id) ? $slide->button_id : $slide->button;
            $slide->caption     = ($slide->caption_id) ? $slide->caption_id : $slide->caption;
        }
    }

    $overview       = Overview::first();
    if(app()->getLocale() == 'en') {
        $overview->title       = $overview->title;
        $overview->description = $overview->description;
        $overview->button      = $overview->button;
    } else {
        $overview->title       = ($overview->title_id) ? $overview->title_id : $overview->title;
        $overview->description = ($overview->description_id) ? $overview->description_id : $overview->description;
        $overview->button      = ($overview->button_id) ? $overview->button_id : $overview->button;
    }

    $latestArticles = Article::where('privacy','public')->where('active',1)->descending()->limit(2)->get();

    foreach($latestArticles as $latestArticle) {
        if(app()->getLocale() == 'en') {
            $latestArticle->title = $latestArticle->title;
            $latestArticle->intro = $latestArticle->intro;
        } else {
            $latestArticle->title = ($latestArticle->title_id) ? $latestArticle->title_id : $latestArticle->title;
            $latestArticle->intro = ($latestArticle->intro_id) ? $latestArticle->intro_id : $latestArticle->intro;
        }
    }

    $publicationCategoryId = DataCategory::where('module','medias')->first()->id;
    $latestPublications    = Data::where('active',1)->where('parent_id','<>',0)->where('category_id',$publicationCategoryId)->ordering()->first();
    if(app()->getLocale() == 'en') {
        $latestPublications->title = $latestPublications->title;
    } else {
        $latestPublications->title = ($latestPublications->title_id) ? $latestPublications->title_id : $latestPublications->title;
    }

    $latestPhotos = Photo::where('active',1)->ordering()->first();
    if(app()->getLocale() == 'en') {
        $latestPhotos->title   = $latestPhotos->title;
        $latestPhotos->caption = $latestPhotos->caption;
    } else {
        $latestPhotos->title   = ($latestPhotos->title_id) ? $latestPhotos->title_id : $latestPhotos->title;
        $latestPhotos->caption = ($latestPhotos->caption_id) ? $latestPhotos->caption_id : $latestPhotos->caption;
    }

    $latestVideos = Video::where('active',1)->ordering()->first();
    if(app()->getLocale() == 'en') {
        $latestVideos->title   = $latestVideos->title;
        $latestVideos->caption = $latestVideos->caption;
    } else {
        $latestVideos->title   = ($latestVideos->title_id) ? $latestVideos->title_id : $latestVideos->title;
        $latestVideos->caption = ($latestVideos->caption_id) ? $latestVideos->caption_id : $latestVideos->caption;
    }
    
    return view('frontend.home',compact('slides','overview','latestArticles','latestPublications','latestPhotos','latestVideos'));

   }

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   function search(Request $request)
   {
    $this->validate($request, [
            'search' => 'required',
        ],[
            'search.required' => __('validation.required',array('attribute' => __('front.layouts.header.search'))),
        ]
    );

    $articles = Article::where('privacy','public')->where('active',1)
    ->where('title','like','%'.$request->search.'%')
    ->descending()->get();

    $practices = Practice::where('privacy','public')->where('active',1)
    ->where('title','like','%'.$request->search.'%')
    ->descending()->get();
    
    $eventsPrev = Event::where('type','prev')->where('active',1)
    ->where('title','like','%'.$request->search.'%')
    ->descending()->get();
    
    $eventsNext = Event::where('type','next')->where('active',1)
    ->where('title','like','%'.$request->search.'%')
    ->descending()->get();

    return view('frontend.search-result',compact('articles','practices','eventsPrev','eventsNext'));

   }

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   function newsletterPost(Request $request)
   {
        $this->validate($request, [
                'firstname' => 'required',
                'email'     => 'required|email|unique:newsletters',
            ],[
                'firstname.required' => __('validation.required',array('attribute' => __('label.firstname.name'))),
                'email.required'     => __('validation.required',array('attribute' => __('label.email.name'))),
            ]
        );

        $newsletter  = new Newsletter;
        $newsletter->fill($request->all());
        $newsletter->save();

        return redirect()->back()->with('alert-success', __('front.newsletter.success'));
   }

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    public function legal($slug)
    {      
        $legal = Legal::where('slug',$slug)->first();

        if(empty($legal)) {
            abort(404);
        }

        if(app()->getLocale() == 'en') {

            $legal->title       = $legal->title;
            $legal->description = $legal->description;
        } else {

            $legal->title       = ($legal->title_id) ? $legal->title_id : $legal->title;
            $legal->description = ($legal->description_id) ? $legal->description_id : $legal->description;
        }
        return view('frontend.legal',compact('legal'));
    }

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    public function sitemap()
    {      
        $navigations =  Navigation::where('active',1)->where('parent_id',0)->ordering()->get();
        return view('frontend.sitemap',compact('navigations'));
    }
}
