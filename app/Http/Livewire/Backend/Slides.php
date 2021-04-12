<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Models\Slide;
use Carbon\Carbon;
use Str;
use Storage;
use Image;

class Slides extends Component
{

    use WithPagination, WithFileUploads;

    public $module = 'slides';

    protected $pagination = 5;

    protected $paginationTheme = 'tailwind';

    public $tab = 'index';

    public $tabLang = 'en';

    public $isForm = 0;

    public $sort,$show;

    public $sortBy,$showDataTotal;

    public $search;

    public $searchClear;

    public $onSave;

    public $confirmArchive;

    public $confirmDestroy;

    public $method;
    
    public 
    $slideId, 
    $title, 
    $title_id, 
    $image, 
    $image_mobile, 
    $copyright, 
    $caption, 
    $caption_id, 
    $description, 
    $description_id, 
    $button, 
    $button_id, 
    $url, 
    $active, 
    $submitted_at, $updated_at;

    public $width = 800, $height = 400;
    public $widthMobile = 300, $heightMobile = 200;


    /**
     * The attributes that are mount assignable.
     *
     * @var array
     */
    public function mount(Request $request)
    {
        $this->method         = 'POST';
        $this->title          = $request->title;
        $this->title_id       = $request->title_id;
        $this->caption        = $request->caption;
        $this->caption_id     = $request->caption_id;
        $this->image          = $request->image;
        $this->image_mobile   = $request->image_mobile;
        $this->copyright      = $request->copyright;
        $this->description    = $request->description;
        $this->description_id = $request->description_id;
        $this->button         = $request->button;
        $this->button_id      = $request->button_id;
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

        $this->slideId        = null;
        $this->title          = null;
        $this->title_id       = null;
        $this->image          = null;
        $this->image_mobile   = null;
        $this->copyright      = null;
        $this->caption        = null;
        $this->caption_id     = null;
        $this->description    = null;
        $this->description_id = null;
        $this->button         = null;
        $this->button_id      = null;
        $this->url            = null;
        $this->active         = null;
        $this->submitted_at   = null;

        $this->tabLang       = 'en';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $pageName = ucfirst((new Slide)->module);

        if($this->tab == 'index') {  

            $slides = Slide::
            when($this->search, function ($query, $filter) {
                $query->where('title','like','%'.$filter.'%');
            })->ordering()->get();

        } else {

            $slides = Slide::onlyTrashed()
            ->when($this->search, function ($query, $filter) {
                $query->where('title','like','%'.$filter.'%');
            })->ordering()->get();

        }
        
        return view('livewire.backend.slides.index',compact('pageName',$this->module));

        $this->closeForm();
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $slide            = new Slide;
        $this->slide      = $slide;
        $this->method       = 'POST';

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
        $slide                = Slide::findOrFail($id);
        $this->method         = 'PUT';
        $this->slideId        = $id;
        $this->slide          = $slide;
        $this->title          = $slide->title;
        $this->title_id       = $slide->title_id;
        $this->slug           = Str::slug($slide->title);
        $this->slug_id        = Str::slug($slide->title_id);
        $this->image          = $slide->image;
        $this->image_mobile   = $slide->image_mobile;
        $this->copyright      = $slide->copyright;
        $this->caption        = $slide->caption;
        $this->caption_id     = $slide->caption_id;
        $this->description    = $slide->description;
        $this->description_id = $slide->description_id;
        $this->button         = $slide->button;
        $this->button_id      = $slide->button_id;
        $this->url            = $slide->url;
        $this->active         = $slide->active;
        $this->submitted_at   = Carbon::parse($slide->submitted_at)->toFormattedDateString();
        $this->updated_at     = $slide->updated_at;

        $this->tabLang       = 'en';
     
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
            'title'        => 'required',
        ]);

        if(config('app.bilingual') == true) {
            $this->validate([
                'title_id'    => 'required',
            ]);
        }
        
        // if clear image 
        if($this->method == 'PUT' && $this->image == null) {
            $slides = Slide::find($this->slideId);
            Storage::disk('public')->delete($this->module.'/'.$slides->image);
        }
        // image
        if (count(collect($this->image)) > 1) {

            $this->validate([
                'image' => 'nullable|image|max:5000',
            ]);
            // remove old image on put
            if($this->method == 'PUT') {
                $slides = Slide::find($this->slideId);
                Storage::disk('public')->delete($this->module.'/'.$slides->image);
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

        // image mobile
        if (count(collect($this->image_mobile)) > 1) {

            $this->validate([
                'image_mobile' => 'nullable|image|max:5000',
            ]);
            // remove old image on put
            if($this->method == 'PUT') {
                $slides = Slide::find($this->slideId);
                Storage::disk('public')->delete($this->module.'/'.$slides->image_mobile);
            }

            $renameImageMobile   = preg_replace('/\..+$/', '', $this->image_mobile->getClientOriginalName());
            $uploadImageMobile   = Str::slug($renameImageMobile, '-') . '-' . Str::random(5) . '.' . $this->image_mobile->getClientOriginalExtension();

            $setImageMobile = Image::make($this->image_mobile->getRealPath());
            $setImageMobile->fit($this->widthMobile, $this->heightMobile, function ($constraintMobile) {
                $constraintMobile->aspectRatio();
            });
            $setImageMobile->stream();
            Storage::disk('public')->put($this->module. '/' . $uploadImageMobile, $setImageMobile, 'public');
            
            $putImageMobile    = $uploadImageMobile;
        } else {
            $putImageMobile    = $this->image_mobile;
        }

        $input = [
            'user_id'        => auth()->user()->id,
            'title'          => $this->title,
            'title_id'       => $this->title_id,
            'slug'           => Str::slug($this->title),
            'slug_id'        => Str::slug($this->title_id),
            'image'          => $putImage,
            'image_mobile'   => $putImageMobile,
            'copyright'      => $this->copyright,
            'caption'        => $this->caption,
            'caption_id'     => $this->caption_id,
            'description'    => $this->description,
            'description_id' => $this->description_id,
            'button'         => $this->button,
            'button_id'      => $this->button_id,
            'url'            => $this->url,
            'active'         => ($this->active) ? 1 : 0,
            'submitted_at'   => $this->submitted_at ? $this->submitted_at : now(),
        ];

        Slide::updateOrCreate(['id' => $this->slideId], $input);

        $this->slideId ? $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.updated',array('attribute' => (new Slide)->module))]) : $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.created',array('attribute' => (new Slide)->module))]);
        
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
        $slide  = Slide::findOrFail($id);

        $duplicate           = $slide->replicate();
        $duplicate->title    = $slide->title.$copy;
        $duplicate->title_id = $slide->title_id.$copy;
        $duplicate->active   = 0;
        $duplicate->image    = null;
        $duplicate->save();
   
        $this->emit('alert', ['type' => 'info', 'message' => __('validation.action.duplicated',array('attribute' => (new Slide)->module))]);
   
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
        Slide::withTrashed()->find($id)->restore();
        $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.restored',array('attribute' => (new Slide)->module))]);
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function reOrder($orderIds)
    {
        foreach($orderIds as $key => $orderId) {
            $slide = Slide::find($orderId['value']);
            $input = [
                'ordering_at' => $orderId['order'],
            ];
            Slide::updateOrCreate(['id' => $slide->id], $input);
        }
        $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.ordered',array('attribute' => (new Slide)->module))]);
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
        Slide::find($id)->delete();
        $this->emit('alert', ['type' => 'warning', 'message' => __('validation.action.archived',array('attribute' => (new Slide)->module))]);
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
        $slides = Slide::withTrashed()->find($id);
        if($slides->image) {
            Storage::disk('public')->delete($this->module.'/'.$slides->image);
        }
        if($slides->image_mobile) {
            Storage::disk('public')->delete($this->module.'/'.$slides->image_mobile);
        }
        $slides->forceDelete();
        $this->emit('alert', ['type' => 'error', 'message' => __('validation.action.destroyed',array('attribute' => (new Slide)->module))]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function sortBy()
    {
        $this->sortBy;
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function showDataTotal()
    {
        $this->showDataTotal;
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function clearImage($attribute)
    {
        $this->{$attribute} = null;
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
    public function pagination()
    {
         $this->emit('pagination'); 
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

}
