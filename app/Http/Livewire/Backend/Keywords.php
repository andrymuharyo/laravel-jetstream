<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Models\Keyword;
use Carbon\Carbon;
use Str;
use Storage;
use Image;

class Keywords extends Component
{

    use WithPagination, WithFileUploads;

    public $module = 'keywords';

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

    public $listPrivacy, $setPrivacy;
    
    public 
    $keywordId, 
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

        $this->listPrivacy  = array(
            'private'     => 'private',
            'public'      => 'public',
        );
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->keywordId        = null;
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
        $pageName = ucfirst((new Keyword)->module);

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
                    $keywords = Keyword::orderBy($expSort[0],$expSort[1])->paginate($showDataTotal);
                } else {
                    $keywords = Keyword::descending()->paginate($showDataTotal);
                }

            } else {
                if($this->sortBy) {
                    $expSort = explode('-',$this->sortBy);
                    $keywords = Keyword::onlyTrashed()->orderBy($expSort[0],$expSort[1])->paginate($showDataTotal);
                } else {
                    $keywords = Keyword::onlyTrashed()->descending()->paginate($showDataTotal);
                }

            }
        } else {
            if($this->tab == 'index') {  
                $keywords = Keyword::where('title','like','%'.$this->search.'%')->descending()->paginate($showDataTotal);
            } else {
                $keywords = Keyword::onlyTrashed()->where('title','like','%'.$this->search.'%')->descending()->paginate($showDataTotal);
            }
        }

        foreach($keywords as $key => $keyword) {
            if($this->page && $this->page <> 1) {
                $current = $keywords->currentpage();
                $perpage = $keywords->perpage();
                $loop = ($current-1) * $perpage + 1 + $key;
            } else {
                $loop = $key+1;
            }
            $keyword->no = $loop;
        }
        
        return view('livewire.backend.keywords.index',compact('pageName',$this->module));

        $this->closeForm();
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $keyword            = new Keyword;
        $this->keyword      = $keyword;
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
        $keyword              = Keyword::findOrFail($id);
        $this->method         = 'PUT';
        $this->keywordId      = $id;
        $this->keyword        = $keyword;
        $this->privacy        = $keyword->privacy;
        $this->title          = $keyword->title;
        $this->title_id       = $keyword->title_id;
        $this->active         = $keyword->active;
        $this->submitted_at   = Carbon::parse($keyword->submitted_at)->toFormattedDateString();
        $this->updated_at     = $keyword->updated_at;

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

        if($this->method == 'POST') {
            $input = [
                'user_id'          => auth()->user()->id,
                'unique_id'        => Str::random(5),
                'title'            => $this->title,
                'title_id'         => $this->title_id,
                'active'           => ($this->active) ? 1 : 0,
                'submitted_at'     => $this->submitted_at ? $this->submitted_at : now(),
            ];

        } else {
           
            $input = [
                'user_id'          => auth()->user()->id,
                'title'            => $this->title,
                'title_id'         => $this->title_id,
                'active'           => ($this->active) ? 1 : 0,
                'submitted_at'     => $this->submitted_at ? $this->submitted_at : now(),
            ];
        }


        Keyword::updateOrCreate(['id' => $this->keywordId], $input);

        $this->keywordId ? $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.updated',array('attribute' => (new Keyword)->module))]) : $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.created',array('attribute' => (new Keyword)->module))]);
        
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
        $keyword  = Keyword::findOrFail($id);

        $duplicate           = $keyword->replicate();
        $duplicate->title    = $keyword->title.$copy;
        $duplicate->title_id = $keyword->title_id.$copy;
        $duplicate->active   = 0;
        $duplicate->save();
   
        $this->emit('alert', ['type' => 'info', 'message' => __('validation.action.duplicated',array('attribute' => (new Keyword)->module))]);
   
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
        Keyword::withTrashed()->find($id)->restore();
        $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.restored',array('attribute' => (new Keyword)->module))]);
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
        Keyword::find($id)->delete();
        $this->emit('alert', ['type' => 'warning', 'message' => __('validation.action.archived',array('attribute' => (new Keyword)->module))]);
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
        $keywords = Keyword::withTrashed()->find($id);
        $keywords->forceDelete();
        $this->emit('alert', ['type' => 'error', 'message' => __('validation.action.destroyed',array('attribute' => (new Keyword)->module))]);
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
    public function setPrivacy()
    {
        $this->setPrivacy;
    }

}
