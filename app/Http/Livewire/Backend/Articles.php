<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Models\Article;
use Carbon\Carbon;
use Str;
use Storage;
use Image;

class Articles extends Component
{

    use WithPagination, WithFileUploads;

    public $module = 'articles';

    protected $pagination = 5;

    protected $paginationTheme = 'tailwind';

    public $tab = 'index';

    public $isForm = 0;

    public $sort,$show;

    public $sortBy,$showDataTotal;

    public $search;

    public $searchClear;

    public $confirmArchive;

    public $confirmDestroy;

    public $method;
    
    public 
    $articleId, 
    $title, 
    $image, 
    $caption, 
    $intro, 
    $description, 
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
        $this->caption      = $request->caption;
        $this->imageUpload  = $request->imageUpload;
        $this->image        = $request->image;
        $this->intro        = $request->intro;
        $this->description  = $request->description;
        $this->active       = $request->active;
        $this->submitted_at = Carbon::parse($request->submitted_at)->format('Y-m-d');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $pageName = ucfirst((new Article)->module);

        $search = '%'.$this->search.'%';

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

        if($this->tab == 'index') {  

            if($this->sortBy) {
                $expSort = explode('-',$this->sortBy);
                $articles = Article::where('title','like',$search)->orderBy($expSort[0],$expSort[1])->paginate($showDataTotal);
            } else {
                $articles = Article::where('title','like',$search)->descending()->paginate($showDataTotal);
            }

        } else {

            if($this->sortBy) {
                $expSort = explode('-',$this->sortBy);
                $articles = Article::onlyTrashed()->where('title','like',$search)->orderBy($expSort[0],$expSort[1])->paginate($showDataTotal);
            } else {
                $articles = Article::onlyTrashed()->where('title','like',$search)->descending()->paginate($showDataTotal);
            }

        }
        
        return view('livewire.backend.articles.index',compact('pageName',$this->module));

        $this->closeForm();
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $article            = new Article;
        $this->article      = $article;
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
        $article            = Article::findOrFail($id);
        $this->method       = 'PUT';
        $this->articleId    = $id;
        $this->article      = $article;
        $this->title        = $article->title;
        $this->slug         = Str::slug($article->title);
        $this->image        = $article->image;
        $this->caption      = $article->caption;
        $this->active       = $article->active;
        $this->intro        = $article->intro;
        $this->description  = $article->description;
        $this->submitted_at = Carbon::parse($article->submitted_at)->toFormattedDateString();
        $this->updated_at   = $article->updated_at;
     
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
            'title' => 'required',
            'submitted_at' => 'required',
        ]);
        // if clear image 
        if($this->method == 'PUT' && $this->image == null) {
            $articles = Article::find($this->articleId);
            Storage::disk('public')->delete($this->module.'/'.$articles->image);
        }
        // image
        if (count(collect($this->image)) > 1) {

            $this->validate([
                'image' => 'mimes:jpg,png|max:5000',
            ]);
            // remove old image on put
            if($this->method == 'PUT') {
                $articles = Article::find($this->articleId);
                Storage::disk('public')->delete($this->module.'/'.$articles->image);
            }

            $renameImage   = preg_replace('/\..+$/', '', $this->image->getClientOriginalName());
            $uploadImage = Str::slug($renameImage, '-') . '-' . Str::random(5) . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/'.$this->module,$uploadImage);
            
            $putImage    = $uploadImage;
        } else {
            $putImage    = $this->image;
        }

        $input = [
            'title'        => $this->title,
            'slug'         => Str::slug($this->title),
            'image'        => $putImage,
            'caption'      => $this->caption,
            'intro'        => $this->intro,
            'description'  => $this->description,
            'active'       => ($this->active) ? 1 : 0,
            'submitted_at' => $this->submitted_at ? $this->submitted_at : now(),
        ];

        Article::updateOrCreate(['id' => $this->articleId], $input);

        $this->articleId ? $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.updated',array('attribute' => (new Article)->module))]) : $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.created',array('attribute' => (new Article)->module))]);
        $this->closeForm();
        $this->resetInputFields();
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
        $article  = Article::findOrFail($id);

        $duplicate = $article->replicate();
        $duplicate->title   = $article->title.$copy;
        $duplicate->image   = null;
        $duplicate->save();
   
        $this->emit('alert', ['type' => 'info', 'message' => __('validation.action.duplicated',array('attribute' => (new Article)->module))]);
   
        $this->closeForm();
        $this->resetInputFields();
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
    private function resetInputFields(){
        $this->title        = '';
        $this->image        = '';
        $this->caption      = '';
        $this->intro        = '';
        $this->description  = '';
        $this->active       = '';
        $this->submitted_at = '';
        $this->articleId    = '';
    }
      
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function restore($id)
    {
        Article::withTrashed()->find($id)->restore();
        $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.restored',array('attribute' => (new Article)->module))]);
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
        Article::find($id)->delete();
        $this->emit('alert', ['type' => 'warning', 'message' => __('validation.action.archived',array('attribute' => (new Article)->module))]);
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
        $articles = Article::withTrashed()->find($id);
        if($articles->image) {
            Storage::disk('public')->delete($this->module.'/'.$articles->image);
        }
        $articles->forceDelete();
        $this->emit('alert', ['type' => 'error', 'message' => __('validation.action.destroyed',array('attribute' => (new Article)->module))]);
    }
}
