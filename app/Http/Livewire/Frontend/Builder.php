<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

// Database
use App\Models\Builder as BuilderModel;

// Plugins
use Jenssegers\Agent\Agent;
use Carbon\Carbon;
use Str;
use Storage;
use Image;

class Builder extends Component
{
    use WithPagination, WithFileUploads;

    public $module = 'builder';

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
            $builder  = BuilderModel::where('active',0)->where('slug',$this->slug)->first();
        } else {
            $builder  = BuilderModel::where('active',1)->where('slug',$this->slug)->first();
        }

        // if no page data
        if(!$builder) {
            abort(404);
        }

        if(app()->getLocale() == 'en') {
            $builder->title       = $builder->title;
            $builder->intro       = $builder->intro;
            $builder->description = $builder->description;
            $builder->caption     = $builder->caption;
        } else {
            $builder->title       = ($builder->title_id) ? $builder->title_id : $builder->title;
            $builder->intro       = ($builder->intro_id) ? $builder->intro_id : $builder->intro;
            $builder->description = ($builder->description_id) ? $builder->description_id : $builder->description;
            $builder->caption     = ($builder->caption_id) ? $builder->caption_id : $builder->caption;
        }

        return view('livewire.frontend.builder', compact('agent','builder'))->layout('layouts.front');
    }
}
