<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Models\Legal;
use Carbon\Carbon;
use Str;
use Storage;
use Image;

class Legals extends Component
{

    use WithPagination, WithFileUploads;

    public $module = 'legals';

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
    $legalId, 
    $title, 
    $title_id, 
    $slug, 
    $slug_id, 
    $description, 
    $description_id, 
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
        $this->slug             = $request->slug;
        $this->slug_id          = $request->slug_id;
        $this->description      = $request->description;
        $this->description_id   = $request->description_id;
        $this->active           = $request->active;
        $this->submitted_at     = Carbon::parse($request->submitted_at)->format('Y-m-d');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->legalId        = null;
        $this->title          = null;
        $this->title_id       = null;
        $this->slug           = null;
        $this->slug_id        = null;
        $this->description    = null;
        $this->description_id = null;
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
        $pageName = ucfirst((new Legal)->module);

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
                    $legals = Legal::orderBy($expSort[0],$expSort[1])->paginate($showDataTotal);
                } else {
                    $legals = Legal::descending()->paginate($showDataTotal);
                }

            } else {
                if($this->sortBy) {
                    $expSort = explode('-',$this->sortBy);
                    $legals = Legal::onlyTrashed()->orderBy($expSort[0],$expSort[1])->paginate($showDataTotal);
                } else {
                    $legals = Legal::onlyTrashed()->descending()->paginate($showDataTotal);
                }

            }
        } else {
            if($this->tab == 'index') {  
                $legals = Legal::where('title','like','%'.$this->search.'%')->descending()->paginate($showDataTotal);
            } else {
                $legals = Legal::onlyTrashed()->where('title','like','%'.$this->search.'%')->descending()->paginate($showDataTotal);
            }
        }

        foreach($legals as $key => $legal) {
            if($this->page && $this->page <> 1) {
                $current = $legals->currentpage();
                $perpage = $legals->perpage();
                $loop = ($current-1) * $perpage + 1 + $key;
            } else {
                $loop = $key+1;
            }
            $legal->no = $loop;
        }
        
        return view('livewire.backend.legals.index',compact('pageName',$this->module));

        $this->closeForm();
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $legal            = new Legal;
        $this->legal      = $legal;
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
        $legal                = Legal::findOrFail($id);
        $this->method         = 'PUT';
        $this->legalId        = $id;
        $this->legal          = $legal;
        $this->title          = $legal->title;
        $this->title_id       = $legal->title_id;
        $this->slug           = Str::slug($legal->title);
        $this->slug_id        = Str::slug($legal->title_id);
        $this->description    = $legal->description;
        $this->description_id = $legal->description_id;
        $this->active         = $legal->active;
        $this->submitted_at   = Carbon::parse($legal->submitted_at)->toFormattedDateString();
        $this->updated_at     = $legal->updated_at;

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
            'slug'             => Str::slug($this->title),
            'slug_id'          => Str::slug($this->title_id),
            'description'      => $this->description,
            'description_id'   => $this->description_id,
            'active'           => ($this->active) ? 1 : 0,
            'submitted_at'     => $this->submitted_at ? $this->submitted_at : now(),
        ];

        Legal::updateOrCreate(['id' => $this->legalId], $input);

        $this->legalId ? $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.updated',array('attribute' => (new Legal)->module))]) : $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.created',array('attribute' => (new Legal)->module))]);
        
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
        $legal  = Legal::findOrFail($id);

        $duplicate           = $legal->replicate();
        $duplicate->title    = $legal->title.$copy;
        $duplicate->title_id = $legal->title_id.$copy;
        $duplicate->active   = 0;
        $duplicate->save();
   
        $this->emit('alert', ['type' => 'info', 'message' => __('validation.action.duplicated',array('attribute' => (new Legal)->module))]);
   
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
        Legal::withTrashed()->find($id)->restore();
        $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.restored',array('attribute' => (new Legal)->module))]);
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
        Legal::find($id)->delete();
        $this->emit('alert', ['type' => 'warning', 'message' => __('validation.action.archived',array('attribute' => (new Legal)->module))]);
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
        $legals = Legal::withTrashed()->find($id);
        $legals->forceDelete();
        $this->emit('alert', ['type' => 'error', 'message' => __('validation.action.destroyed',array('attribute' => (new Legal)->module))]);
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
