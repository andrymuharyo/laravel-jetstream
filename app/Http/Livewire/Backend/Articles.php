<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Models\Article;
use App\Models\ArticleCategory as Category;
use App\Models\Keyword;
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

    public $tabLang = 'en';

    public $isForm = 0;

    public $isModal = 0;

    public $showImage;

    public $sort,$show;

    public $sortBy,$showDataTotal;

    public $showCategories;

    public $search;

    public $searchClear;

    public $onSave;

    public $confirmArchive;

    public $confirmDestroy;

    public $method;

    public $listPrivacy, $setPrivacy;

    public $listCategories, $setCategories;

    public $listKeywords, $setKeywords;
    
    public 
    $articleId, 
    $slug,
    $slug_id,
    $privacy, 
    $categories, 
    $keywords, 
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
        $this->privacy          = $request->privacy;
        $this->categories       = $request->categories;
        $this->keywords         = $request->keywords;
        $this->title            = $request->title;
        $this->title_id         = $request->title_id;
        $this->image            = $request->image;
        $this->caption          = $request->caption;
        $this->caption_id       = $request->caption_id;
        $this->intro            = $request->intro;
        $this->intro_id         = $request->intro_id;
        $this->description      = $request->description;
        $this->description_id   = $request->description_id;
        $this->active           = $request->active;
        $this->submitted_at     = Carbon::parse($request->submitted_at)->format('Y-m-d');

        $this->listPrivacy  = array(
            'private'     => 'private',
            'public'      => 'public',
        );

        $this->listCategories  = Category::where('active',1)->descending()->pluck('title','unique_id');

        $this->listKeywords    = Keyword::where('active',1)->descending()->pluck('title','unique_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->articleId        = null;
        $this->privacy          = null;
        $this->categories       = null;
        $this->keywords         = null;
        $this->title            = null;
        $this->title_id         = null;
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
        $pageName = ucfirst((new Article)->module);

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
                    $expSort  = explode('-',$this->sortBy);
                    $articles =  $this->showCategories ? Article::where('categories','like','%'.$this->showCategories.'%')->orderBy($expSort[0],$expSort[1])->paginate($showDataTotal) : Article::orderBy($expSort[0],$expSort[1])->paginate($showDataTotal);
                } else {
                    $articles =  $this->showCategories ? Article::where('categories','like','%'.$this->showCategories.'%')->descending()->paginate($showDataTotal) : Article::descending()->paginate($showDataTotal);
                }

            } else {
                if($this->sortBy) {
                    $expSort  = explode('-',$this->sortBy);
                    $articles =  $this->showCategories ? Article::onlyTrashed()->where('categories','like','%'.$this->showCategories.'%')->orderBy($expSort[0],$expSort[1])->paginate($showDataTotal) : Article::onlyTrashed()->orderBy($expSort[0],$expSort[1])->paginate($showDataTotal);
                } else {
                    $articles =  $this->showCategories ? Article::onlyTrashed()->where('categories','like','%'.$this->showCategories.'%')->descending()->paginate($showDataTotal) : Article::onlyTrashed()->descending()->paginate($showDataTotal);
                }

            }
        } else {
            if($this->tab == 'index') {  
                $articles =  $this->showCategories ? Article::where('categories','like','%'.$this->showCategories.'%')->where('title','like','%'.$this->search.'%')->descending()->paginate($showDataTotal) : Article::where('title','like','%'.$this->search.'%')->descending()->paginate($showDataTotal);
            } else {
                $articles =  $this->showCategories ? Article::onlyTrashed()->where('categories','like','%'.$this->showCategories.'%')->where('title','like','%'.$this->search.'%')->descending()->paginate($showDataTotal) : Article::onlyTrashed()->where('title','like','%'.$this->search.'%')->descending()->paginate($showDataTotal);
            }
        }

        foreach($articles as $key => $article) {
            if($this->page && $this->page <> 1) {
                $current = $articles->currentpage();
                $perpage = $articles->perpage();
                $loop = ($current-1) * $perpage + 1 + $key;
            } else {
                $loop = $key+1;
            }
            $article->no = $loop;
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
        $article              = Article::findOrFail($id);
        $this->method         = 'PUT';
        $this->articleId      = $id;
        $this->article        = $article;
        $this->privacy        = $article->privacy;
        if($article->categories <> null) {
            $this->categories = $article->categories;
        } else {
            $this->categories = null;
        }
        if($article->keywords <> null) {
            $this->keywords = $article->keywords;
        } else {
            $this->keywords = null;
        }
        $this->title          = $article->title;
        $this->title_id       = $article->title_id;
        $this->slug           = Str::slug($article->title);
        $this->slug_id        = Str::slug($article->title_id);
        $this->image          = $article->image;
        $this->caption        = $article->caption;
        $this->caption_id     = $article->caption_id;
        $this->intro          = $article->intro;
        $this->intro_id       = $article->intro_id;
        $this->description    = $article->description;
        $this->description_id = $article->description_id;
        $this->active         = $article->active;
        $this->submitted_at   = Carbon::parse($article->submitted_at)->toFormattedDateString();
        $this->updated_at     = $article->updated_at;

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
            $articles = Article::find($this->articleId);
            Storage::disk('public')->delete($this->module.'/'.$articles->image);
        }
        // image
        if (count(collect($this->image)) > 1) {

            $this->validate([
                'image' => 'nullable|image|max:5000',
            ]);
            // remove old image on put
            if($this->method == 'PUT') {
                $articles = Article::find($this->articleId);
                Storage::disk('public')->delete($this->module.'/'.$articles->image);
            }

            $renameImage = preg_replace('/\..+$/', '', $this->image->getClientOriginalName());
            $uploadImage = Str::slug($renameImage, '-') . '-' . Str::random(5) . '.' . $this->image->getClientOriginalExtension();

            $setImage = Image::make($this->image->getRealPath());
            $setImage->fit($this->width, $this->height, function ($constraint) {
                $constraint->aspectRatio();
            });
            $setImage->stream();
            Storage::disk('public')->put($this->module. '/' . $uploadImage, $setImage, 'public');

            //$this->image->storeAs('public/'.$this->module,$uploadImage);
            
            $putImage    = $uploadImage;
        } else {
            $putImage    = $this->image;
        }

        $input = [
            'user_id'          => auth()->user()->id,
            'privacy'          => $this->privacy,
            'categories'       => str_replace(',',';',$this->categories),
            'keywords'         => str_replace(',',';',$this->keywords),
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

        Article::updateOrCreate(['id' => $this->articleId], $input);

        $this->articleId ? $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.updated',array('attribute' => (new Article)->module))]) : $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.created',array('attribute' => (new Article)->module))]);
        
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
        $article  = Article::findOrFail($id);

        $duplicate           = $article->replicate();
        $duplicate->title    = $article->title.$copy;
        $duplicate->title_id = $article->title_id.$copy;
        $duplicate->slug     = Str::slug($article->title.$copy);
        $duplicate->slug_id  = Str::slug($article->title_id.$copy);
        $duplicate->active   = 0;
        $duplicate->image    = null;
        $duplicate->save();
   
        $this->emit('alert', ['type' => 'info', 'message' => __('validation.action.duplicated',array('attribute' => (new Article)->module))]);
   
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
    public function showCategories()
    {
        $this->showCategories;
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
    public function setPrivacy()
    {
        $this->setPrivacy;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function setKeywords()
    {
        $this->setKeywords;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal($id)
    {
        $article = Article::find($id);
        $this->isModal = true;
        $this->showImage = $article->getImage('image');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isModal = false;
        $this->showImage = null;
    }

}
