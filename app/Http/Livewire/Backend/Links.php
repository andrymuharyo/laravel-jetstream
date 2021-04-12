<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Models\Link;
use Carbon\Carbon;
use Str;
use Storage;
use Image;
use DB;

class Links extends Component
{

    use WithPagination, WithFileUploads;

    public $module = 'links';

    public $tab = 'index';

    public $tabLang = 'en';

    public $isForm = 0;

    public $sort,$show;

    public $search;

    public $searchClear;

    public $onSave;

    public $confirmArchive;

    public $confirmDestroy;

    public $method;
    
    public $applyNestable;
    
    public 
    $linkId,
    $title,
    $title_id,
    $url,
    $active,
    $submitted_at, $updated_at;


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
        $this->url          = $request->url;
        $this->active       = $request->active;
        $this->submitted_at = Carbon::parse($request->submitted_at)->format('Y-m-d');

        $this->applyNestable = $this->applyNestable($request);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->linkId = null;
        $this->title        = null;
        $this->title_id     = null;
        $this->url          = null;
        $this->active       = null;
        $this->submitted_at = null;

        $this->tabLang       = 'en';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $pageName = ucfirst((new Link)->module);

        if($this->tab == 'index') {  

            $links = Link::
            when($this->search, function ($query, $filter) {
                $query->where('title','like','%'.$filter.'%');
            })->ordering()->get();

        } else {

            $links = Link::onlyTrashed()
            ->when($this->search, function ($query, $filter) {
                $query->where('title','like','%'.$filter.'%');
            })->ordering()->get();

        }
        
        return view('livewire.backend.links.index',compact('pageName',$this->module));

        $this->closeForm();
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $link         = new Link;
        $this->link   = $link;
        $this->method = 'POST';

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
        $link               = Link::findOrFail($id);
        $this->method       = 'PUT';
        $this->linkId       = $id;
        $this->link         = $link;
        $this->title        = $link->title;
        $this->title_id     = $link->title_id;
        $this->url          = $link->url;
        $this->active       = $link->active;
        $this->submitted_at = Carbon::parse($link->submitted_at)->toFormattedDateString();
        $this->updated_at   = $link->updated_at;

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

        $input = [
            'user_id'      => auth()->user()->id,
            'title'        => $this->title,
            'title_id'     => $this->title_id,
            'url'          => $this->url,
            'active'       => ($this->active) ? 1 : 0,
            'submitted_at' => $this->submitted_at ? $this->submitted_at : now(),
        ];

        Link::updateOrCreate(['id' => $this->linkId], $input);

        $this->linkId ? $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.updated',array('attribute' => (new Link)->module))]) : $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.created',array('attribute' => (new Link)->module))]);
        
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
        $link  = Link::findOrFail($id);

        $duplicate = $link->replicate();
        $duplicate->title       = $link->title.$copy;
        $duplicate->title_id    = $link->title_id.$copy;
        $duplicate->active   = 0;
        $duplicate->save();
   
        $this->emit('alert', ['type' => 'info', 'message' => __('validation.action.duplicated',array('attribute' => (new Link)->module))]);
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
        Link::withTrashed()->find($id)->restore();
        $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.restored',array('attribute' => (new Link)->module))]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function reOrder($orderIds)
    {
        foreach($orderIds as $key => $orderId) {
            $link = Link::find($orderId['value']);
            $input = [
                'ordering_at' => $orderId['order'],
            ];
            Link::updateOrCreate(['id' => $link->id], $input);
        }
        $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.ordered',array('attribute' => (new Link)->module))]);
    }

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function applyNestable(Request $request)
    {
        if($request->all()) {

            foreach(json_decode($request->nestable) as $key => $link) {
                $nav              = Link::find($link->id);
                $input = [
                    'ordering_at'       => $key+1,
                ];
                Link::updateOrCreate(['id' => $nav->id], $input);
            }
            
            $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.ordered',array('attribute' => (new Link)->module))]);
            
        }
        
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
        Link::find($id)->delete();
        $this->emit('alert', ['type' => 'warning', 'message' => __('validation.action.archived',array('attribute' => (new Link)->module))]);
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
        $links = Link::withTrashed()->find($id);
        $links->forceDelete();
        $this->emit('alert', ['type' => 'error', 'message' => __('validation.action.destroyed',array('attribute' => (new Link)->module))]);
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

}
