<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Models\VideoCategory;
use App\Models\Video;
use Carbon\Carbon;
use Str;
use Storage;
use Image;
use DB;

class Videos extends Component
{

    use WithPagination, WithFileUploads;

    public $module = 'videos';

    public $tab = 'index';

    public $tabLang = 'en';

    public $isForm = 0;

    public $isModal = 0;

    public $showVideo;

    public $sort,$show;

    public $search;

    public $searchClear;

    public $onSave;

    public $confirmArchive;

    public $confirmDestroy;

    public $method;

    public $categoryId, $categoryTitle;
    
    public 
    $videoId,
    $image, 
    $caption, 
    $caption_id, 
    $title,
    $title_id,
    $description,
    $description_id,
    $url,
    $active,
    $submitted_at, $updated_at;

    public $width = 800, $height = 400;


    /**
     * The attributes that are mount assignable.
     *
     * @var array
     */
    public function mount(Request $request)
    {
        $this->method = 'POST';
        if($request->category) {
            $this->categoryId    = VideoCategory::find($request->category)->id;
            $this->categoryTitle = VideoCategory::find($request->category)->title;
        }
        $this->image          = $request->image;
        $this->caption        = $request->caption;
        $this->caption_id     = $request->caption_id;
        $this->title          = $request->title;
        $this->title_id       = $request->title_id;
        $this->description    = $request->description;
        $this->description_id = $request->description_id;
        $this->url            = $request->url;
        $this->active         = $request->active;
        $this->submitted_at   = Carbon::parse($request->submitted_at)->format('Y-m-d');
        
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->videoId        = null;
        $this->image          = null;
        $this->caption        = null;
        $this->caption_id     = null;
        $this->title          = null;
        $this->title_id       = null;
        $this->description    = null;
        $this->description_id = null;
        $this->url            = null;
        $this->active         = null;
        $this->submitted_at   = null;

        $this->tabLang = 'en';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $pageName = ucfirst((new Video)->module);

        if($this->tab == 'index') {  

            $videos = Video::
            when($this->search, function ($query, $filter) {
                $query->where('title','like','%'.$filter.'%');
            })->where('category_id',$this->categoryId)->ordering()->get();

        } else {

            $videos = Video::onlyTrashed()
            ->when($this->search, function ($query, $filter) {
                $query->where('title','like','%'.$filter.'%');
            })->where('category_id',$this->categoryId)->ordering()->get();

        }
        
        return view('livewire.backend.videos.index',compact('pageName',$this->module));

        $this->closeForm();
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $video            = new Video;
        $this->video      = $video;
        $this->method    = 'POST';

        $this->resetInputFields();
        $this->openForm();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $video                = Video::findOrFail($id);
        $this->method         = 'PUT';
        $this->videoId        = $id;
        $this->video          = $video;
        $this->image          = $video->image;
        $this->caption        = $video->caption;
        $this->caption_id     = $video->caption_id;
        $this->title          = $video->title;
        $this->title_id       = $video->title_id;
        $this->description    = $video->description;
        $this->description_id = $video->description_id;
        $this->url            = $video->url;
        $this->active         = $video->active;
        $this->submitted_at   = Carbon::parse($video->submitted_at)->toFormattedDateString();
        $this->updated_at     = $video->updated_at;

        $this->tabLang = 'en';
     
        $this->openForm();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store(Request $request)
    {
        $this->validate([
            'title'    => 'required',
            'url'      => 'required|url',
        ]);

        if(config('app.bilingual') == true) {
            $this->validate([
                'title_id'    => 'required',
            ]);
        }

        // if clear image 
        if($this->method == 'PUT' && $this->image == null) {
            $videos = Video::find($this->videoId);
            Storage::disk('public')->delete($this->module.'/'.$videos->image);
        }
        // image
        if (count(collect($this->image)) > 1) {

            $this->validate([
                'image' => 'nullable|image|max:5000',
            ]);
            // remove old image on put
            if($this->method == 'PUT') {
                $videos = Video::find($this->videoId);
                Storage::disk('public')->delete($this->module.'/'.$videos->image);
            }

            $renameImage   = preg_replace('/\..+$/', '', $this->image->getClientOriginalName());
            $uploadImage = Str::slug($renameImage, '-') . '-' . Str::random(5) . '.' . $this->image->getClientOriginalExtension();

            $setImage = Image::make($this->image->getRealPath());
            $setImage->fit($this->width, $this->height, function ($constraint) {
                $constraint->aspectRatio();
            });
            $setImage->stream();
            Storage::disk('public')->put($this->module. '/' . $uploadImage, $setImage, 'public');
            
            $putImage    = $uploadImage;
        } else {
            $putImage    = $this->image;
        }

        $input = [
            'user_id'        => auth()->user()->id,
            'category_id'    => $this->categoryId,
            'image'          => $putImage,
            'caption'        => $this->caption,
            'caption_id'     => $this->caption_id,
            'title'          => $this->title,
            'title_id'       => $this->title_id,
            'description'    => $this->description,
            'description_id' => $this->description_id,
            'url'            => $this->url,
            'active'         => ($this->active) ? 1 : 0,
            'submitted_at'   => $this->submitted_at ? $this->submitted_at : now(),
        ];

        Video::updateOrCreate(['id' => $this->videoId], $input);

        $this->videoId ? $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.updated',array('attribute' => (new Video)->module))]) : $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.created',array('attribute' => (new Video)->module))]);
        
        if($this->onSave == 'exit') {
            $this->closeForm();
            $this->resetInputFields();
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function duplicate($id)
    {
    
        $plus = +1;
        $copy = '-duplicate-' . Str::slug(now()) . $plus . '';
        $video  = Video::findOrFail($id);

        $duplicate = $video->replicate();
        $duplicate->title       = $video->title.$copy;
        $duplicate->title_id    = $video->title_id.$copy;
        $duplicate->active      = 0;
        $duplicate->image       = null;
        $duplicate->save();
   
        $this->emit('alert', ['type' => 'info', 'message' => __('validation.action.duplicated',array('attribute' => (new Video)->module))]);
        $this->closeForm();
   
        $this->resetInputFields();
    }
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function restore($id)
    {
        Video::withTrashed()->find($id)->restore();
        $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.restored',array('attribute' => (new Video)->module))]);
    }

    /**
     * Confirm that the user would like to delete their account.
     *
     * @return void
     */
    public function confirmArchive($id)
    {
        $this->confirmArchive = $id;
    }

    /**
     * Confirm that the user would like to delete their account.
     *
     * @return void
     */
    public function cancelArchive()
    {
        $this->confirmArchive = false;
    }
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function archive($id)
    {
        Video::find($id)->delete();
        $this->emit('alert', ['type' => 'warning', 'message' => __('validation.action.archived',array('attribute' => (new Video)->module))]);
    }

    /**
     * Confirm that the user would like to delete their account.
     *
     * @return void
     */
    public function confirmDestroy($id)
    {
        $this->confirmDestroy = $id;
    }

    /**
     * Confirm that the user would like to delete their account.
     *
     * @return void
     */
    public function cancelDestroy()
    {
        $this->confirmDestroy = false;
    }
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function destroy($id)
    {
        $video = Video::withTrashed()->find($id);
        if($video->image) {
            Storage::disk('public')->delete($this->module.'/'.$video->image);
        }
        $video->forceDelete();
        $this->emit('alert', ['type' => 'error', 'message' => __('validation.action.destroyed',array('attribute' => (new Video)->module))]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function reOrder($orderIds)
    {
        foreach($orderIds as $key => $orderId) {
            $video = Video::find($orderId['value']);
            $input = [
                'ordering_at' => $orderId['order'],
            ];
            Video::updateOrCreate(['id' => $video->id], $input);
        }
        $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.ordered',array('attribute' => (new Video)->module))]);
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function searchClear()
    {
        $this->search = '';
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function onSave($type = '')
    {
        $this->onSave = $type;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openForm()
    {
        $this->isForm = true;
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeForm()
    {
        $this->isForm = false;
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function clearFile()
    {
        $this->file = null;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal($id)
    {
        $this->isModal = true;
        $video = Video::find($id);
        $explodeVideo = explode('/',$video->url);
        if(count($explodeVideo) == 4) {
            if($explodeVideo[2] == 'www.youtube.com') {
                $embedVideo = str_replace('watch?v=','',$explodeVideo[3]);
            } elseif($explodeVideo[2] == 'youtu.be') {
                $embedVideo = $explodeVideo[3];
            } 
        } else {
            $embedVideo = $video->url;
        }
        $this->showVideo = $embedVideo;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isModal = false;
        $this->showVideo = null;
    }

}
