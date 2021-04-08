<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Models\Post as Data;
use Carbon\Carbon;
use Str;
use Storage;
use Image;

class Posts extends Component
{

    use WithPagination, WithFileUploads;

    public $module = 'posts';

    public $isForm = 0;

    public $tabLang = 'en';

    public $onSave;

    public $method;
    
    public 
    $postId, 
    $title, 
    $title_id, 
    $description, 
    $description_id, 
    $button, 
    $button_id, 
    $url, 
    $target, 
    $updated_at;


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
        $this->description    = $request->description;
        $this->description_id = $request->description_id;
        $this->button         = $request->button;
        $this->button_id      = $request->button_id;
        $this->url            = $request->url;
        $this->target         = $request->target;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->postId     = null;
        $this->title          = null;
        $this->title_id       = null;
        $this->description    = null;
        $this->description_id = null;
        $this->button         = null;
        $this->button_id      = null;
        $this->url            = null;
        $this->target         = null;
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $pageName = ucfirst((new Data)->module);

        $posts = Data::get();

        return view('livewire.backend.posts.index',compact('pageName',$this->module));

        $this->closeForm();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $post                 = Data::findOrFail($id);
        $this->method         = 'PUT';
        $this->postId         = $id;
        $this->post           = $post;
        $this->title          = $post->title;
        $this->title_id       = $post->title_id;
        $this->description    = $post->description;
        $this->description_id = $post->description_id;
        $this->button         = $post->button;
        $this->button_id      = $post->button_id;
        $this->url            = $post->url;
        $this->target         = $post->target;
        $this->updated_at     = $post->updated_at;
     
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
            'title_id' => 'required',
        ]);

        $input = [
            'title'          => $this->title,
            'title_id'       => $this->title_id,
            'description'    => $this->description,
            'description_id' => $this->description_id,
            'button'         => $this->button,
            'button_id'      => $this->button_id,
            'url'            => $this->url,
            'target'         => $this->target,
        ];

        Data::updateOrCreate(['id' => $this->postId], $input);

        $this->postId ? $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.updated',array('attribute' => (new Data)->module))]) : $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.created',array('attribute' => (new Post)->module))]);
        
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


}
