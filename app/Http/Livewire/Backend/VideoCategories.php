<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Models\VideoCategory;
use Carbon\Carbon;
use Str;
use Storage;
use Image;

class VideoCategories extends Component
{

    use WithPagination, WithFileUploads;

    public $module = 'video_categories';

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
    $videoCategoryId, 
    $title, 
    $title_id, 
    $active, 
    $submitted_at, $updated_at;


    /**
     * The attributes that are mount assignable.
     *
     * @var array
     */
    public function mount(Request $request)
    {
        $this->method           = 'POST';
        $this->title            = $request->title;
        $this->title_id         = $request->title_id;
        $this->active           = $request->active;
        $this->submitted_at     = Carbon::parse($request->submitted_at)->format('Y-m-d');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->videoCategoryId  = null;
        $this->title            = null;
        $this->title_id         = null;
        $this->active           = null;
        $this->submitted_at     = null;

        $this->tabLang       = 'en';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $pageName = ucfirst((new VideoCategory)->module);

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
                    $videoCategories = VideoCategory::orderBy($expSort[0],$expSort[1])->paginate($showDataTotal);
                } else {
                    $videoCategories = VideoCategory::descending()->paginate($showDataTotal);
                }

            } else {
                if($this->sortBy) {
                    $expSort = explode('-',$this->sortBy);
                    $videoCategories = VideoCategory::onlyTrashed()->orderBy($expSort[0],$expSort[1])->paginate($showDataTotal);
                } else {
                    $videoCategories = VideoCategory::onlyTrashed()->descending()->paginate($showDataTotal);
                }

            }
        } else {
            if($this->tab == 'index') {  
                $videoCategories = VideoCategory::where('title','like','%'.$this->search.'%')->descending()->paginate($showDataTotal);
            } else {
                $videoCategories = VideoCategory::onlyTrashed()->where('title','like','%'.$this->search.'%')->descending()->paginate($showDataTotal);
            }
        }

        foreach($videoCategories as $key => $videoCategory) {
            if($this->page && $this->page <> 1) {
                $current = $videoCategories->currentpage();
                $perpage = $videoCategories->perpage();
                $loop = ($current-1) * $perpage + 1 + $key;
            } else {
                $loop = $key+1;
            }
            $videoCategory->no = $loop;
        }
        
        return view('livewire.backend.video_categories.index',compact('pageName','videoCategories'));

        $this->closeForm();
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $videoCategory            = new VideoCategory;
        $this->videoCategory      = $videoCategory;
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
        $videoCategory         = VideoCategory::findOrFail($id);
        $this->method         = 'PUT';
        $this->videoCategoryId = $id;
        $this->videoCategory   = $videoCategory;
        $this->title          = $videoCategory->title;
        $this->title_id       = $videoCategory->title_id;
        $this->active         = $videoCategory->active;
        $this->submitted_at   = Carbon::parse($videoCategory->submitted_at)->toFormattedDateString();
        $this->updated_at     = $videoCategory->updated_at;

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
    
        $input = [
            'user_id'          => auth()->user()->id,
            'title'            => $this->title,
            'title_id'         => $this->title_id,
            'active'           => ($this->active) ? 1 : 0,
            'submitted_at'     => $this->submitted_at ? $this->submitted_at : now(),
        ];

        VideoCategory::updateOrCreate(['id' => $this->videoCategoryId], $input);

        $this->videoCategoryId ? $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.updated',array('attribute' => (new VideoCategory)->module))]) : $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.created',array('attribute' => (new VideoCategory)->module))]);
        
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
        $videoCategory  = VideoCategory::findOrFail($id);

        $duplicate           = $videoCategory->replicate();
        $duplicate->title    = $videoCategory->title.$copy;
        $duplicate->title_id = $videoCategory->title_id.$copy;
        $duplicate->active   = 0;
        $duplicate->save();
   
        $this->emit('alert', ['type' => 'info', 'message' => __('validation.action.duplicated',array('attribute' => (new VideoCategory)->module))]);
   
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
        VideoCategory::withTrashed()->find($id)->restore();
        $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.restored',array('attribute' => (new VideoCategory)->module))]);
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
        VideoCategory::find($id)->delete();
        $this->emit('alert', ['type' => 'warning', 'message' => __('validation.action.archived',array('attribute' => (new VideoCategory)->module))]);
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
        $videoCategories = VideoCategory::withTrashed()->find($id);
        $videoCategories->forceDelete();
        $this->emit('alert', ['type' => 'error', 'message' => __('validation.action.destroyed',array('attribute' => (new VideoCategory)->module))]);
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
    public function clearImage()
    {
        $this->image = null;
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
