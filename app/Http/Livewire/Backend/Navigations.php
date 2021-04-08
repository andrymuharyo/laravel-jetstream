<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Models\Navigation;
use App\Models\Content;
use Carbon\Carbon;
use Str;
use Storage;
use Image;
use DB;

class Navigations extends Component
{

    use WithPagination, WithFileUploads;

    public $module = 'navigations';

    public $tab = 'index';

    public $tabLang = 'en';

    public $isForm = 0;

    public $isCollapse = false;

    public $sort,$show;

    public $search;

    public $searchClear;

    public $onSave;

    public $confirmArchive;

    public $confirmDestroy;

    public $method;

    public $listType, $setType;

    public $listTarget, $setTarget;

    public $modelContent, $setModelContent;
    
    public 
    $navigationId,
    $parent_id,
    $type,
    $target,
    $title,
    $title_id,
    $intro,
    $intro_id,
    $url,
    $uri,
    $content_id,
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
        $this->parent_id    = $request->parent_id;
        $this->type         = $request->type;
        $this->target       = $request->target;
        $this->title        = $request->title;
        $this->title_id     = $request->title_id;
        $this->intro        = $request->intro;
        $this->intro_id     = $request->intro_id;
        $this->url          = $request->url;
        $this->uri          = $request->uri;
        $this->content_id   = $request->content_id;
        $this->active       = $request->active;
        $this->submitted_at = Carbon::parse($request->submitted_at)->format('Y-m-d');

        $this->listType = array(
            'url'     => __('label.url.name'),
            'uri'     => __('label.uri.name'),
            'content' => __('label.content.name'),
        );

        $this->listTarget = array(
            '_self'  => __('label.target._self'),
            '_blank' => __('label.target._blank'),
        );

        $this->modelContent = Content::pluck('title','id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->navigationId = null;
        $this->type         = null;
        $this->target       = null;
        $this->title        = null;
        $this->title_id     = null;
        $this->intro        = null;
        $this->intro_id     = null;
        $this->url          = null;
        $this->uri          = null;
        $this->content_id   = null;
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
        $pageName = ucfirst((new Navigation)->module);

        if($this->tab == 'index') {  

            $navigations = Navigation::
            when(!$this->search, function ($query, $filter) {
                $query->where('parent_id',0);
            })
            ->when($this->search, function ($query, $filter) {
                $query->where('title','like','%'.$filter.'%');
            })->ordering()->get();

        } else {

            $navigations = Navigation::onlyTrashed()
            ->when(!$this->search, function ($query, $filter) {
                $query->where('parent_id',0);
            })
            ->when($this->search, function ($query, $filter) {
                $query->where('title','like','%'.$filter.'%');
            })->ordering()->get();

        }
        
        return view('livewire.backend.navigations.index',compact('pageName',$this->module));

        $this->closeForm();
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create($parentId = 0)
    {
        $navigation       = new Navigation;
        $this->parent_id  = $parentId;
        $this->navigation = $navigation;
        $this->method     = 'POST';

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
        $navigation          = Navigation::findOrFail($id);
        $this->method        = 'PUT';
        $this->navigationId  = $id;
        $this->navigation    = $navigation;
        $this->parent_id     = $navigation->parent_id;
        $this->type          = $navigation->type;
        $this->target        = $navigation->target;
        $this->title         = $navigation->title;
        $this->title_id      = $navigation->title_id;
        $this->intro         = $navigation->intro;
        $this->intro_id      = $navigation->intro_id;
        $this->url           = $navigation->url;
        $this->uri           = $navigation->uri;
        $this->content_id    = $navigation->content_id;
        $this->active        = $navigation->active;
        $this->submitted_at  = Carbon::parse($navigation->submitted_at)->toFormattedDateString();
        $this->updated_at    = $navigation->updated_at;

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
            'title'    => 'required',
            'type'     => 'required',
            'target'   => 'required',
        ]);

        if(config('app.bilingual') == true) {
            $this->validate([
                'title_id'    => 'required',
            ]);
        }

        if($this->type == 'url') {
            $this->validate([
                'url'      => 'required|url',
            ]);
        }

        $input = [
            'user_id'      => auth()->user()->id,
            'parent_id'    => $this->parent_id,
            'type'         => $this->type,
            'target'       => $this->target,
            'title'        => $this->title,
            'title_id'     => $this->title_id,
            'intro'        => $this->intro,
            'intro_id'     => $this->intro_id,
            'url'          => $this->url,
            'uri'          => $this->uri,
            'content_id'   => $this->content_id,
            'active'       => ($this->active) ? 1 : 0,
            'submitted_at' => $this->submitted_at ? $this->submitted_at : now(),
        ];

        Navigation::updateOrCreate(['id' => $this->navigationId], $input);

        $this->navigationId ? $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.updated',array('attribute' => (new Navigation)->module))]) : $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.created',array('attribute' => (new Navigation)->module))]);
        
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
        $navigation  = Navigation::findOrFail($id);

        $duplicate = $navigation->replicate();
        $duplicate->title       = $navigation->title.$copy;
        $duplicate->title_id    = $navigation->title_id.$copy;
        $duplicate->active      = 0;
        $duplicate->save();
   
        $this->emit('alert', ['type' => 'info', 'message' => __('validation.action.duplicated',array('attribute' => (new Navigation)->module))]);
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
        Navigation::withTrashed()->find($id)->restore();
        $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.restored',array('attribute' => (new Navigation)->module))]);
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
        Navigation::find($id)->delete();
        $this->emit('alert', ['type' => 'warning', 'message' => __('validation.action.archived',array('attribute' => (new Navigation)->module))]);
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
        $navigations = Navigation::withTrashed()->find($id);
        $navigations->forceDelete();
        $this->emit('alert', ['type' => 'error', 'message' => __('validation.action.destroyed',array('attribute' => (new Navigation)->module))]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function reOrder($orderIds)
    {
        foreach($orderIds as $key => $orderId) {
            $navigation = Navigation::find($orderId['value']);
            $input = [
                'parent_id'   => 0,
                'ordering_at' => $orderId['order'],
            ];
            Navigation::updateOrCreate(['id' => $navigation->id], $input);
        }
        $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.ordered',array('attribute' => (new Navigation)->module))]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function reOrderGroup($orderIds)
    {
        foreach($orderIds as $key => $orderId) {
            foreach($orderId['items'] as $item) {
                $navigation = Navigation::find($item['value']);
                $input = [
                    'parent_id'   => $orderId['value'],
                    'ordering_at' => $item['order'],
                ];
                Navigation::updateOrCreate(['id' => $navigation->id], $input);
            }
        }
        $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.ordered',array('attribute' => (new Navigation)->module))]);
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
    public function setType()
    {
        $this->setType;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function setTarget()
    {
        $this->setTarget;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function setModelContent()
    {
        $this->setModelContent;
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

}
