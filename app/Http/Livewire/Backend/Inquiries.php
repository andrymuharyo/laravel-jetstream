<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Models\Inquiry;
use Carbon\Carbon;
use Str;
use Storage;
use Image;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportInquiry;

class Inquiries extends Component
{

    use WithPagination, WithFileUploads;

    public $module = 'inquiries';

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
    $inquiryId, 
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
        $this->phone     = $request->phone;
        $this->email     = $request->email;
        $this->subject   = $request->subject;
        $this->message   = $request->message;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->inquiryId = null;
        $this->firstname = null;
        $this->lastname  = null;
        $this->phone     = null;
        $this->email     = null;
        $this->subject   = null;
        $this->message   = null;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $pageName = ucfirst((new Inquiry)->module);

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
                    $inquiries = Inquiry::orderBy($expSort[0],$expSort[1])->paginate($showDataTotal);
                } else {
                    $inquiries = Inquiry::descending()->paginate($showDataTotal);
                }

            } else {
                if($this->sortBy) {
                    $expSort = explode('-',$this->sortBy);
                    $inquiries = Inquiry::onlyTrashed()->orderBy($expSort[0],$expSort[1])->paginate($showDataTotal);
                } else {
                    $inquiries = Inquiry::onlyTrashed()->descending()->paginate($showDataTotal);
                }

            }
        } else {
            if($this->tab == 'index') {  
                $inquiries = Inquiry::where('email','like','%'.$this->search.'%')->descending()->paginate($showDataTotal);
            } else {
                $inquiries = Inquiry::onlyTrashed()->where('email','like','%'.$this->search.'%')->descending()->paginate($showDataTotal);
            }
        }

        foreach($inquiries as $key => $inquiry) {
            if($this->page && $this->page <> 1) {
                $current = $inquiries->currentpage();
                $perpage = $inquiries->perpage();
                $loop = ($current-1) * $perpage + 1 + $key;
            } else {
                $loop = $key+1;
            }
            $inquiry->no = $loop;
        }
        
        return view('livewire.backend.inquiries.index',compact('pageName',$this->module));

        $this->closeForm();
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $inquiry            = new Inquiry;
        $this->inquiry      = $inquiry;
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
        $inquiry          = Inquiry::findOrFail($id);
        $this->method     = 'PUT';
        $this->inquiryId  = $id;
        $this->inquiry    = $inquiry;
        $this->firstname  = $inquiry->firstname;
        $this->lastname   = $inquiry->lastname;
        $this->phone      = $inquiry->phone;
        $this->email      = $inquiry->email;
        $this->subject    = $inquiry->subject;
        $this->message    = $inquiry->message;
        $this->updated_at = $inquiry->updated_at;
     
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
        Inquiry::withTrashed()->find($id)->restore();
        $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.restored',array('attribute' => (new Inquiry)->module))]);
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
        Inquiry::find($id)->delete();
        $this->emit('alert', ['type' => 'warning', 'message' => __('validation.action.archived',array('attribute' => (new Inquiry)->module))]);
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
        $inquiry = Inquiry::withTrashed()->find($id);
        $inquiry->forceDelete();
        $this->emit('alert', ['type' => 'error', 'message' => __('validation.action.destroyed',array('attribute' => (new Inquiry)->module))]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function export()
    {
        $excelName = mb_strtolower(__('menu.inquiries.name')).'-'.Str::slug(now(), '-');
        return Excel::download(new ExportInquiry(), $excelName.'.xlsx');
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
