<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Models\Content;
use Carbon\Carbon;
use Str;
use Storage;
use Image;

class Contents extends Component
{

    use WithPagination, WithFileUploads;

    public $module = 'contents';

    public $moduleName = 'contents';

    protected $pagination = 5;

    protected $paginationTheme = 'tailwind';

    public $tab = 'index';

    public $tabLang = 'en';

    public $isForm = 0;

    public $isLayout = 0;

    public $sort,$show;

    public $sortBy,$showDataTotal;

    public $search;

    public $searchClear;

    public $onSave;

    public $confirmArchive;

    public $confirmDestroy;

    public $method;
    
    public 
    $contentId, 
    $slug,
    $slug_id,
    $title, 
    $title_id, 
    $image, 
    $caption, 
    $caption_id, 
    $intro, 
    $intro_id, 
    $description, 
    $description_id, 
    $active, 
    $submitted_at, $updated_at;

    public $width = 800, $height = 400;


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
        $this->caption          = $request->caption;
        $this->caption_id       = $request->caption_id;
        $this->imageUpload      = $request->imageUpload;
        $this->image            = $request->image;
        $this->intro            = $request->intro;
        $this->intro_id         = $request->intro_id;
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
        $this->contentId        = null;
        $this->title            = null;
        $this->title_id         = null;
        $this->imageUpload      = null;
        $this->image            = null;
        $this->caption          = null;
        $this->caption_id       = null;
        $this->intro            = null;
        $this->intro_id         = null;
        $this->description      = null;
        $this->description_id   = null;
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
        $pageName = ucfirst((new Content)->module);

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
                    $contents = Content::orderBy($expSort[0],$expSort[1])->paginate($showDataTotal);
                } else {
                    $contents = Content::descending()->paginate($showDataTotal);
                }

            } else {
                if($this->sortBy) {
                    $expSort = explode('-',$this->sortBy);
                    $contents = Content::onlyTrashed()->orderBy($expSort[0],$expSort[1])->paginate($showDataTotal);
                } else {
                    $contents = Content::onlyTrashed()->descending()->paginate($showDataTotal);
                }

            }
        } else {
            if($this->tab == 'index') {  
                $contents = Content::where('title','like','%'.$this->search.'%')->descending()->paginate($showDataTotal);
            } else {
                $contents = Content::onlyTrashed()->where('title','like','%'.$this->search.'%')->descending()->paginate($showDataTotal);
            }
        }

        foreach($contents as $key => $content) {
            if($this->page && $this->page <> 1) {
                $current = $contents->currentpage();
                $perpage = $contents->perpage();
                $loop = ($current-1) * $perpage + 1 + $key;
            } else {
                $loop = $key+1;
            }
            $content->no = $loop;
        }
        
        return view('livewire.backend.contents.index',compact('pageName',$this->module));

        $this->closeForm();
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $content            = new Content;
        $this->content      = $content;
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
        $content                = Content::findOrFail($id);
        $this->method           = 'PUT';
        $this->contentId        = $id;
        $this->content          = $content;
        $this->title            = $content->title;
        $this->title_id         = $content->title_id;
        $this->slug             = Str::slug($content->title);
        $this->slug_id          = Str::slug($content->title_id);
        $this->image            = $content->image;
        $this->caption          = $content->caption;
        $this->caption_id       = $content->caption_id;
        $this->intro            = $content->intro;
        $this->intro_id         = $content->intro_id;
        $this->description      = $content->description;
        $this->description_id   = $content->description_id;
        $this->active           = $content->active;
        $this->submitted_at     = Carbon::parse($content->submitted_at)->toFormattedDateString();
        $this->updated_at       = $content->updated_at;

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
        
        // if clear image 
        if($this->method == 'PUT' && $this->image == null) {
            $contents = Content::find($this->contentId);
            Storage::disk('public')->delete($this->module.'/'.$contents->image);
        }
        // image
        if (count(collect($this->image)) > 1) {

            $this->validate([
                'image' => 'nullable|image|max:5000',
            ]);
            // remove old image on put
            if($this->method == 'PUT') {
                $contents = Content::find($this->contentId);
                Storage::disk('public')->delete($this->module.'/'.$contents->image);
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
            'user_id'          => auth()->user()->id,
            'title'            => $this->title,
            'title_id'         => $this->title_id,
            'slug'             => Str::slug($this->title),
            'slug_id'          => Str::slug($this->title_id),
            'image'            => $putImage,
            'caption'          => $this->caption,
            'caption_id'       => $this->caption_id,
            'intro'            => $this->intro,
            'intro_id'         => $this->intro_id,
            'description'      => $this->description,
            'description_id'   => $this->description_id,
            'active'           => ($this->active) ? 1 : 0,
            'submitted_at'     => $this->submitted_at ? $this->submitted_at : now(),
        ];

        Content::updateOrCreate(['id' => $this->contentId], $input);

        $this->contentId ? $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.updated',array('attribute' => (new Content)->module))]) : $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.created',array('attribute' => (new Content)->module))]);
        
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
        $content  = Content::findOrFail($id);

        $duplicate           = $content->replicate();
        $duplicate->title    = $content->title.$copy;
        $duplicate->title_id = $content->title_id.$copy;
        $duplicate->slug     = Str::slug($content->title.$copy);
        $duplicate->slug_id  = Str::slug($content->title_id.$copy);
        $duplicate->active   = 0;
        $duplicate->image    = null;
        $duplicate->save();
   
        $this->emit('alert', ['type' => 'info', 'message' => __('validation.action.duplicated',array('attribute' => (new Content)->module))]);
   
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
        Content::withTrashed()->find($id)->restore();
        $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.restored',array('attribute' => (new Content)->module))]);
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
        Content::find($id)->delete();
        $this->emit('alert', ['type' => 'warning', 'message' => __('validation.action.archived',array('attribute' => (new Content)->module))]);
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
        $contents = Content::withTrashed()->find($id);
        if($contents->image) {
            Storage::disk('public')->delete($this->module.'/'.$contents->image);
        }
        $contents->forceDelete();
        $this->emit('alert', ['type' => 'error', 'message' => __('validation.action.destroyed',array('attribute' => (new Content)->module))]);
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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function halfLayout()
    {
        $this->isLayout = true;
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function fullLayout()
    {
        $this->isLayout = false;
    }

}
