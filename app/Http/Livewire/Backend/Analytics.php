<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Models\Analytic;
use Carbon\Carbon;
use Str;
use Storage;
use Image;

class Analytics extends Component
{

    use WithPagination, WithFileUploads;

    public $module = 'analytics';

    public $isForm = 0;

    public $tabLang = 'en';

    public $onSave;

    public $method;
    
    public 
    $analyticId, 
    $analytics_view_id, 
    $service_account_credentials_json, 
    $cache_lifetime_in_minutes, 
    $active,
    $updated_at;

    public $width = 300, $height = 300;


    /**
     * The attributes that are mount assignable.
     *
     * @var array
     */
    public function mount(Request $request)
    {
        $this->method      = 'POST';
        $this->analytics_view_id                = $request->analytics_view_id;
        $this->service_account_credentials_json = $request->service_account_credentials_json;
        $this->cache_lifetime_in_minutes        = $request->cache_lifetime_in_minutes;
        $this->active                           = $request->active;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->analyticId      = null;
        $this->analytics_view_id                = null;
        $this->service_account_credentials_json = null;
        $this->cache_lifetime_in_minutes        = null;
        $this->active                           = null;
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $pageName = ucfirst((new Analytic)->module);

        $analytics = Analytic::get();

        return view('livewire.backend.analytics.index',compact('pageName',$this->module));

        $this->closeForm();
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $analytic            = new Analytic;
        $this->analytic      = $analytic;
        $this->method        = 'POST';

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
        $analytic                               = Analytic::findOrFail($id);
        $this->method                           = 'PUT';
        $this->analyticId                       = $id;
        $this->analytic                         = $analytic;
        $this->analytics_view_id                = $analytic->analytics_view_id;
        $this->service_account_credentials_json = $analytic->service_account_credentials_json;
        $this->cache_lifetime_in_minutes        = $analytic->cache_lifetime_in_minutes;
        $this->updated_at                       = $analytic->updated_at;
        $this->active                           = $analytic->active;
     
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
            'analytics_view_id'    => 'required',
        ]);

        // if clear image 
        if($this->method == 'PUT' && $this->service_account_credentials_json == null) {
            $analytics = Analytic::find($this->analyticId);
            Storage::disk('public')->delete($this->module.'/'.$analytics->service_account_credentials_json);
        }
        // service_account_credentials_json
        if (count(collect($this->service_account_credentials_json)) > 1) {

            $this->validate([
                'service_account_credentials_json' => 'nullable|file|max:5000',
            ]);
            // remove old service_account_credentials_json on put
            if($this->method == 'PUT') {
                $analytics = Analytic::find($this->analyticId);
                Storage::disk('public')->delete($this->module.'/'.$analytics->service_account_credentials_json);
            }

            $renameJson   = preg_replace('/\..+$/', '', $this->service_account_credentials_json->getClientOriginalName());
            $uploadJson   = Str::slug($renameJson, '-') . '-' . Str::random(5) . '.' . $this->service_account_credentials_json->getClientOriginalExtension();

            $this->service_account_credentials_json->storeAs('public/'.$this->module,$uploadJson);
            
            $putJson    = $uploadJson;
        } else {
            $putJson    = $this->service_account_credentials_json;
        }

        $input = [
            'analytics_view_id'                => $this->analytics_view_id,
            'service_account_credentials_json' => $putJson,
            'cache_lifetime_in_minutes'        => $this->cache_lifetime_in_minutes,
            'active'                           => ($this->active) ? 1 : 0,
        ];

        Analytic::updateOrCreate(['id' => $this->analyticId], $input);

        $this->analyticId ? $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.updated',array('attribute' => (new Analytic)->module))]) : $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.created',array('attribute' => (new Analytic)->module))]);
        
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
    public function onSave($type = '')
    {
        $this->onSave = $type;
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


}
