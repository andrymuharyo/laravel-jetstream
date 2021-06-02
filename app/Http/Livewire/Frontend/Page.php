<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

// Database
use App\Models\Content;

// Plugins
use Jenssegers\Agent\Agent;
use Carbon\Carbon;
use Str;
use Storage;
use Image;

class Page extends Component
{
    use WithPagination, WithFileUploads;

    public $module = 'page';

    public $slug;
    
    public function mount(Request $request) {
        
        $this->slug = $request->slug;

    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $agent      = new Agent();
        if(request('view') == 'draft') {
            $content  = Content::where('active',0)->where('slug',$this->slug)->first();
        } else {
            $content  = Content::where('active',1)->where('slug',$this->slug)->first();
        }

        if(app()->getLocale() == 'en') {
            $content->title       = $content->title;
            $content->intro       = $content->intro;
            $content->description = $content->description;
            $content->caption     = $content->caption;
        } else {
            $content->title       = ($content->title_id) ? $content->title_id : $content->title;
            $content->intro       = ($content->intro_id) ? $content->intro_id : $content->intro;
            $content->description = ($content->description_id) ? $content->description_id : $content->description;
            $content->caption     = ($content->caption_id) ? $content->caption_id : $content->caption;
        }

        return view('livewire.frontend.page', compact('agent','content'))->layout('layouts.front');
    }
}
