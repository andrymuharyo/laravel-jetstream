<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Models\Builder;
use App\Models\Widget;
use Carbon\Carbon;
use Str;
use Storage;
use Image;

class Builders extends Component
{

    use WithPagination, WithFileUploads;

    public $module = 'builders';

    public $moduleName = 'pages';

    protected $pagination = 5;

    protected $paginationTheme = 'tailwind';

    public $tab = 'index';

    public $tabLang = 'en';

    public $isForm = 0;

    public $isLayout = 0;

    public $isWidget = 0;

    public $isCollapse = true;

    public $sort,$show;

    public $sortBy,$showDataTotal;

    public $search;

    public $searchClear;

    public $onSave;

    public $confirmArchive;

    public $confirmDestroy;

    public $method;
    
    public 
    $builderId, 
    $slug,
    $slug_id,
    $title, 
    $title_id, 
    $image, 
    $caption, 
    $caption_id, 
    $active, 
    $submitted_at, $updated_at;

    public $width = 800, $height = 400;

    public $showWidgetMenu = false;

    public $widgetType;

    public $widgetSelected = false, $setWidgetSelected;

    public $i = 0;

    public
    $widgets             = [],
    $typeWidget          = [],
    $layoutWidget        = [],
    $captionWidget       = [],
    $captionIdWidget     = [],
    $titleWidget         = [],
    $titleIdWidget       = [],
    $descriptionWidget   = [],
    $descriptionIdWidget = [],
    $activeWidget        = [],

    $savedWidgets             = [],
    $widgetId                 = [],
    $widgetOrderWidget        = [],
    $savedTypeWidget          = [],
    $savedLayoutWidget        = [],
    $savedCaptionWidget       = [],
    $savedCaptionIdWidget     = [],
    $savedTitleWidget         = [],
    $savedTitleIdWidget       = [],
    $savedDescriptionWidget   = [],
    $savedDescriptionIdWidget = [],
    $savedActiveWidget        = [];

    /**
     * The attributes that are mount assignable.
     *
     * @var array
     */
    public function mount(Request $request)
    {
        $this->method       = 'POST';
        $this->title        = $request->title;
        $this->title_id     = $request->title_id;
        $this->caption      = $request->caption;
        $this->caption_id   = $request->caption_id;
        $this->imageUpload  = $request->imageUpload;
        $this->image        = $request->image;
        $this->active       = $request->active;
        $this->submitted_at = Carbon::parse($request->submitted_at)->format('Y-m-d');

        // Widget
        $this->widgetType = $request->widgetType;

        $this->widgets             = $request->widgets;
        $this->typeWidget          = $request->typeWidget;
        $this->layoutWidget        = $request->layoutWidget;
        $this->captionWidget       = $request->captionWidget;
        $this->captionIdWidget     = $request->captionIdWidget;
        $this->titleWidget         = $request->titleWidget;
        $this->titleIdWidget       = $request->titleIdWidget;
        $this->descriptionWidget   = $request->descriptionWidget;
        $this->descriptionIdWidget = $request->descriptionIdWidget;
        $this->activeWidget        = $request->activeWidget;

        $this->savedWidgets             = $request->savedWidgets;
        $this->widgetId                 = $request->widgetId;
        $this->savedOrderWidget         = $request->savedOrderWidget;
        $this->savedTypeWidget          = $request->savedTypeWidget;
        $this->savedLayoutWidget        = $request->savedLayoutWidget;
        $this->savedCaptionWidget       = $request->savedCaptionWidget;
        $this->savedCaptionIdWidget     = $request->savedCaptionIdWidget;
        $this->savedTitleWidget         = $request->savedTitleWidget;
        $this->savedTitleIdWidget       = $request->savedTitleIdWidget;
        $this->savedDescriptionWidget   = $request->savedDescriptionWidget;
        $this->savedDescriptionIdWidget = $request->savedDescriptionIdWidget;
        $this->savedActiveWidget        = $request->savedActiveWidget;
        $this->savedWidgets             = $request->savedWidgets;

    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->builderId    = null;
        $this->title        = null;
        $this->title_id     = null;
        $this->imageUpload  = null;
        $this->image        = null;
        $this->caption      = null;
        $this->caption_id   = null;
        $this->active       = null;
        $this->submitted_at = null;

        $this->widgets             = [];
        $this->typeWidget          = [];
        $this->layoutWidget        = [];
        $this->captionWidget       = [];
        $this->captionIdWidget     = [];
        $this->titleWidget         = [];
        $this->titleIdWidget       = [];
        $this->descriptionWidget   = [];
        $this->descriptionIdWidget = [];
        $this->activeWidget        = [];
    
        $this->savedWidgets             = [];
        $this->widgetId                 = [];
        $this->savedOrderWidget         = [];
        $this->savedTypeWidget          = [];
        $this->savedLayoutWidget        = [];
        $this->savedCaptionWidget       = [];
        $this->savedCaptionIdWidget     = [];
        $this->savedTitleWidget         = [];
        $this->savedTitleIdWidget       = [];
        $this->savedDescriptionWidget   = [];
        $this->savedDescriptionIdWidget = [];
        $this->savedActiveWidget        = [];

        $this->tabLang = 'en';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $pageName = ucfirst((new Builder)->module);

        $this->sort = array(
            'title-asc' => 'title (ascending)',
            'title-desc' => 'title (descending)',
            'submitted_at-asc' => 'submitted at (ascending)',
            'submitted_at-desc' => 'submitted at (descending)',
        );

        $this->show = array(
            '5' => 5,
            '10' => 10,
            '25' => 25,
            '50' => 50,
        );

        $showDataTotal = ($this->showDataTotal) ? $this->showDataTotal : $this->pagination;

        if($this->search == null) {
            if($this->tab == 'index') {  

                if($this->sortBy) {
                    $expSort = explode('-',$this->sortBy);
                    $builders = Builder::orderBy($expSort[0],$expSort[1])->paginate($showDataTotal);
                } else {
                    $builders = Builder::descending()->paginate($showDataTotal);
                }

            } else {
                if($this->sortBy) {
                    $expSort = explode('-',$this->sortBy);
                    $builders = Builder::onlyTrashed()->orderBy($expSort[0],$expSort[1])->paginate($showDataTotal);
                } else {
                    $builders = Builder::onlyTrashed()->descending()->paginate($showDataTotal);
                }

            }
        } else {
            if($this->tab == 'index') {  
                $builders = Builder::where('title','like','%'.$this->search.'%')->descending()->paginate($showDataTotal);
            } else {
                $builders = Builder::onlyTrashed()->where('title','like','%'.$this->search.'%')->descending()->paginate($showDataTotal);
            }
        }

        foreach($builders as $key => $builder) {
            if($this->page && $this->page <> 1) {
                $current = $builders->currentpage();
                $perpage = $builders->perpage();
                $loop = ($current-1) * $perpage + 1 + $key;
            } else {
                $loop = $key+1;
            }
            $builder->no = $loop;
        }
        
        return view('livewire.backend.builders.index',compact('pageName',$this->module));

        $this->closeForm();
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $builder            = new Builder;
        $this->builder      = $builder;
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
        $builder                = Builder::findOrFail($id);
        $this->method           = 'PUT';
        $this->builderId        = $id;
        $this->builder          = $builder;
        $this->title            = $builder->title;
        $this->title_id         = $builder->title_id;
        $this->slug             = Str::slug($builder->title);
        $this->slug_id          = Str::slug($builder->title_id);
        $this->image            = $builder->image;
        $this->caption          = $builder->caption;
        $this->caption_id       = $builder->caption_id;
        $this->active           = $builder->active;
        $this->submitted_at     = Carbon::parse($builder->submitted_at)->toFormattedDateString();
        $this->updated_at       = $builder->updated_at;

        $this->i                   = 0;
        $this->widgets             = [];
        $this->typeWidget          = [];
        $this->layoutWidget        = [];
        $this->captionWidget       = [];
        $this->captionIdWidget     = [];
        $this->titleWidget         = [];
        $this->titleIdWidget       = [];
        $this->descriptionWidget   = [];
        $this->descriptionIdWidget = [];
        $this->activeWidget        = [];

        $this->savedWidgets             = Widget::where('model_id',$id)->ordering()->pluck('id');
        $this->widgetId                 = Widget::where('model_id',$id)->ordering()->pluck('id');
        $this->savedOrderWidget         = Widget::where('model_id',$id)->ordering()->pluck('ordering_at');
        $this->savedTypeWidget          = Widget::where('model_id',$id)->ordering()->pluck('type');
        $this->savedLayoutWidget        = Widget::where('model_id',$id)->ordering()->pluck('layout');
        $this->savedCaptionWidget       = Widget::where('model_id',$id)->ordering()->pluck('caption');
        $this->savedCaptionIdWidget     = Widget::where('model_id',$id)->ordering()->pluck('caption_id');
        $this->savedTitleWidget         = Widget::where('model_id',$id)->ordering()->pluck('title');
        $this->savedTitleIdWidget       = Widget::where('model_id',$id)->ordering()->pluck('title_id');
        $this->savedDescriptionWidget   = Widget::where('model_id',$id)->ordering()->pluck('description');
        $this->savedDescriptionIdWidget = Widget::where('model_id',$id)->ordering()->pluck('description_id');
        $this->savedActiveWidget        = Widget::where('model_id',$id)->ordering()->pluck('active');



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
            'submitted_at' => 'required',
        ]);

        if(config('app.bilingual') == true) {
            $this->validate([
                'title_id'    => 'required',
            ]);
        }
        
        // if clear image 
        if($this->method == 'PUT' && $this->image == null) {
            $builders = Builder::find($this->builderId);
            Storage::disk('public')->delete($this->module.'/'.$builders->image);
        }
        // image
        if (count(collect($this->image)) > 1) {

            $this->validate([
                'image' => 'nullable|image|max:5000',
            ]);
            // remove old image on put
            if($this->method == 'PUT') {
                $builders = Builder::find($this->builderId);
                Storage::disk('public')->delete($this->module.'/'.$builders->image);
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
            'user_id'          => auth()->user()->id,
            'title'            => $this->title,
            'title_id'         => $this->title_id,
            'slug'             => Str::slug($this->title),
            'slug_id'          => Str::slug($this->title_id),
            'image'            => $putImage,
            'caption'          => $this->caption,
            'caption_id'       => $this->caption_id,
            'active'           => ($this->active) ? 1 : 0,
            'submitted_at'     => $this->submitted_at ? $this->submitted_at : now(),
        ];

        if(Builder::updateOrCreate(['id' => $this->builderId], $input)) {

            // create widgets
            if($this->widgets) {

                foreach($this->widgets as $key => $widgets) {

                }
            }
        }

        $this->builderId ? $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.updated',array('attribute' => (new Builder)->module))]) : $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.created',array('attribute' => (new Builder)->module))]);
        
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
        $builder  = Builder::findOrFail($id);

        $duplicate           = $builder->replicate();
        $duplicate->title    = $builder->title.$copy;
        $duplicate->title_id = $builder->title_id.$copy;
        $duplicate->slug     = Str::slug($builder->title.$copy);
        $duplicate->slug_id  = Str::slug($builder->title_id.$copy);
        $duplicate->active   = 0;
        $duplicate->image    = null;
        $duplicate->save();
   
        $this->emit('alert', ['type' => 'info', 'message' => __('validation.action.duplicated',array('attribute' => (new Builder)->module))]);
   
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
        Builder::withTrashed()->find($id)->restore();
        $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.restored',array('attribute' => (new Builder)->module))]);
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
        Builder::find($id)->delete();
        $this->emit('alert', ['type' => 'warning', 'message' => __('validation.action.archived',array('attribute' => (new Builder)->module))]);
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
        $builders = Builder::withTrashed()->find($id);
        if($builders->image) {
            Storage::disk('public')->delete($this->module.'/'.$builders->image);
        }
        $builders->forceDelete();
        $this->emit('alert', ['type' => 'error', 'message' => __('validation.action.destroyed',array('attribute' => (new Builder)->module))]);
    }



    public function sortBy()
    {
        $this->sortBy;
    }

    public function showDataTotal()
    {
        $this->showDataTotal;
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
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function clearImage()
    {
        $this->image = null;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function expand()
    {
        $this->isCollapse = false;
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function collapse()
    {
        $this->isCollapse = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function halfLayout()
    {
        $this->isLayout = true;
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function fullLayout()
    {
        $this->isLayout = false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openWidget()
    {
        $this->showWidgetMenu = true;
        $this->widgetSelected = false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeWidget()
    {
        $this->showWidgetMenu = false;
        $this->widgetSelected = false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function selectWidget($param)
    {
        $this->widgetSelected = $param;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function addWidget($i)
    {
        $this->showWidgetMenu = false;

        $i = $i + 1;
        $this->i = $i;
        $this->typeWidget[$i] = $this->widgetSelected;

        array_push($this->widgets , $this->i);
        
        $this->emit('goToBottom');

    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function removeWidget($key)
    {
        $i  = $key;
        $this->i = $i;
        unset($this->widgets[$i]);
        unset($this->typeWidget[$i]);
    }

}
