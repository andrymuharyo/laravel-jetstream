<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Models\Newsletter;
use Carbon\Carbon;
use Str;
use Storage;
use Image;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportNewsletter;

class Newsletters extends Component
{

    use WithPagination, WithFileUploads;

    public $module = 'newsletters';

    protected $pagination = 5;

    protected $paginationTheme = 'tailwind';

    public $tab = 'index';

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
    $newsletterId, 
    $firstname, 
    $lastname, 
    $phone, 
    $email, 
    $subject, 
    $message, 
    $updated_at;


    /**
     * The attributes that are mount assignable.
     *
     * @var array
     */
    public function mount(Request $request)
    {
        $this->method    = 'POST';
        $this->firstname = $request->firstname;
        $this->lastname  = $request->lastname;
        $this->email     = $request->email;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->newsletterId = null;
        $this->firstname = null;
        $this->lastname  = null;
        $this->email     = null;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $pageName = ucfirst((new Newsletter)->module);

        $this->sort = array(
            'email-asc' => 'email (ascending)',
            'email-desc' => 'email (descending)',
            'created_at-asc' => 'created at (ascending)',
            'created_at-desc' => 'created at (descending)',
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
                    $newsletters = Newsletter::orderBy($expSort[0],$expSort[1])->paginate($showDataTotal);
                } else {
                    $newsletters = Newsletter::descending()->paginate($showDataTotal);
                }

            } else {
                if($this->sortBy) {
                    $expSort = explode('-',$this->sortBy);
                    $newsletters = Newsletter::onlyTrashed()->orderBy($expSort[0],$expSort[1])->paginate($showDataTotal);
                } else {
                    $newsletters = Newsletter::onlyTrashed()->descending()->paginate($showDataTotal);
                }

            }
        } else {
            if($this->tab == 'index') {  
                $newsletters = Newsletter::where('email','like','%'.$this->search.'%')->descending()->paginate($showDataTotal);
            } else {
                $newsletters = Newsletter::onlyTrashed()->where('email','like','%'.$this->search.'%')->descending()->paginate($showDataTotal);
            }
        }

        foreach($newsletters as $key => $newsletter) {
            if($this->page && $this->page <> 1) {
                $current = $newsletter->currentpage();
                $perpage = $newsletter->perpage();
                $loop = ($current-1) * $perpage + 1 + $key;
            } else {
                $loop = $key+1;
            }
            $newsletter->no = $loop;
        }
        
        return view('livewire.backend.newsletters.index',compact('pageName',$this->module));

        $this->closeForm();
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $newsletter            = new Newsletter;
        $this->newsletter      = $newsletter;
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
        $newsletter         = Newsletter::findOrFail($id);
        $this->method       = 'PUT';
        $this->newsletterId = $id;
        $this->newsletter   = $newsletter;
        $this->firstname    = $newsletter->firstname;
        $this->lastname     = $newsletter->lastname;
        $this->email        = $newsletter->email;
        $this->updated_at   = $newsletter->updated_at;
     
        $this->openForm();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function duplicate($id)
    {
        //
    }
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function restore($id)
    {
        Newsletter::withTrashed()->find($id)->restore();
        $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.restored',array('attribute' => (new Newsletter)->module))]);
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
        Newsletter::find($id)->delete();
        $this->emit('alert', ['type' => 'warning', 'message' => __('validation.action.archived',array('attribute' => (new Newsletter)->module))]);
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
        $newsletter = Newsletter::withTrashed()->find($id);
        $newsletter->forceDelete();
        $this->emit('alert', ['type' => 'error', 'message' => __('validation.action.destroyed',array('attribute' => (new Newsletter)->module))]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function export()
    {
        $excelName = mb_strtolower(__('menu.newsletters.name')).'-'.Str::slug(now(), '-');
        return Excel::download(new ExportNewsletter(), $excelName.'.xlsx');
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
