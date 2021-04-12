<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Models\Meta;
use Carbon\Carbon;
use Str;
use Storage;
use Image;

class Metas extends Component
{

    use WithPagination, WithFileUploads;

    public $module = 'metas';

    public $isForm = 0;

    public $tabLang = 'en';

    public $onSave;

    public $method;
    
    public 
    $metaId, 
    $image, 
    $title, 
    $author, 
    $description, 
    $keywords, 
    $copyright, 
    $analytic, 
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
        $this->image       = $request->image;
        $this->title       = $request->title;
        $this->author      = $request->author;
        $this->description = $request->description;
        $this->keywords    = $request->keywords;
        $this->copyright   = $request->copyright;
        $this->analytic    = $request->analytic;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->metaId      = null;
        $this->image       = null;
        $this->title       = null;
        $this->author      = null;
        $this->description = null;
        $this->keywords    = null;
        $this->copyright   = null;
        $this->analytic    = null;
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $pageName = ucfirst((new Meta)->module);

        $metas = Meta::get();

        return view('livewire.backend.metas.index',compact('pageName',$this->module));

        $this->closeForm();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $meta              = Meta::findOrFail($id);
        $this->method      = 'PUT';
        $this->metaId      = $id;
        $this->meta        = $meta;
        $this->image       = $meta->image;
        $this->title       = $meta->title;
        $this->author      = $meta->author;
        $this->description = $meta->description;
        $this->keywords    = $meta->keywords;
        $this->copyright   = $meta->copyright;
        $this->analytic    = $meta->analytic;
        $this->updated_at  = $meta->updated_at;
     
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
        ]);

        // if clear image 
        if($this->method == 'PUT' && $this->image == null) {
            $metas = Meta::find($this->metaId);
            Storage::disk('public')->delete($this->module.'/'.$metas->image);
        }
        // image
        if (count(collect($this->image)) > 1) {

            $this->validate([
                'image' => 'nullable|image|max:5000',
            ]);
            // remove old image on put
            if($this->method == 'PUT') {
                $metas = Meta::find($this->metaId);
                Storage::disk('public')->delete($this->module.'/'.$metas->image);
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
            'image'       => $putImage,
            'title'       => $this->title,
            'author'      => $this->author,
            'description' => $this->description,
            'keywords'    => $this->keywords,
            'copyright'   => $this->copyright,
            'analytic'    => $this->analytic,
        ];

        Meta::updateOrCreate(['id' => $this->metaId], $input);

        $this->metaId ? $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.updated',array('attribute' => (new Meta)->module))]) : $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.created',array('attribute' => (new Meta)->module))]);
        
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
    public function clearImage()
    {
        $this->image = null;
    }


}
