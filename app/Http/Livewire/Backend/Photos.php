<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Models\PhotoCategory;
use App\Models\Photo;
use App\Models\PhotoItem;
use Carbon\Carbon;
use Str;
use Storage;
use Image;
use DB;

class Photos extends Component
{

    use WithPagination, WithFileUploads;

    public $module = 'photos';

    protected $pagination = 5;

    protected $paginationTheme = 'tailwind';

    public $tab = 'index';

    public $tabLang = 'en';

    public $isForm = 0;

    public $isItem = 0;

    public $isCollapse = true;

    public $sort,$show;

    public $sortBy,$showDataTotal;

    public $search;

    public $searchClear;

    public $onSave;

    public $confirmArchive;

    public $confirmDestroy;

    public $confirmDestroyItem;

    public $method;

    public $listAttachment, $setAttachment;

    public $categoryId, $categoryTitle;
    
    public 
    $photoId,
    $image, 
    $caption,
    $caption_id,
    $title,
    $title_id,
    $description,
    $description_id,
    $active,
    $submitted_at, $updated_at;

    public $width = 800, $height = 600;

    public $i = 0;

    public
    $items         = [],
    $imageItem     = [],
    $titleItem     = [],
    $titleIdItem   = [],
    $captionItem   = [],
    $captionIdItem = [],

    $savedItems         = [],
    $itemId             = [],
    $savedOrderItem     = [],
    $savedImageItem     = [],
    $savedTitleItem     = [],
    $savedTitleIdItem   = [],
    $savedCaptionItem   = [],
    $savedCaptionIdItem = [];


    /**
     * The attributes that are mount assignable.
     *
     * @var array
     */
    public function mount(Request $request)
    {
        $this->method = 'POST';

        $this->categoryId    = PhotoCategory::find($request->category)->id;
        $this->categoryTitle = PhotoCategory::find($request->category)->title;
        
        $this->image          = $request->image;
        $this->caption        = $request->caption;
        $this->caption_id     = $request->caption_id;
        $this->title          = $request->title;
        $this->title_id       = $request->title_id;
        $this->description    = $request->description;
        $this->description_id = $request->description_id;
        $this->active         = $request->active;
        $this->submitted_at   = Carbon::parse($request->submitted_at)->format('Y-m-d');

        $this->items         = $request->items;
        $this->imageItem     = $request->imageItem;
        $this->titleItem     = $request->titleItem;
        $this->titleIdItem   = $request->titleIdItem;
        $this->captionItem   = $request->captionItem;
        $this->captionIdItem = $request->captionIdItem;

        $this->savedItems         = $request->savedItems;
        $this->itemId             = $request->itemId;
        $this->savedOrderItem     = $request->savedOrderItem;
        $this->savedImageItem     = $request->savedImageItem;
        $this->savedTitleItem     = $request->savedTitleItem;
        $this->savedTitleIdItem   = $request->savedTitleIdItem;
        $this->savedCaptionItem   = $request->savedCaptionItem;
        $this->savedCaptionIdItem = $request->savedCaptionIdItem;
    
        
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->photoId        = null;
        $this->image          = null;
        $this->caption        = null;
        $this->caption_id     = null;
        $this->title          = null;
        $this->title_id       = null;
        $this->description    = null;
        $this->description_id = null;
        $this->active         = null;
        $this->submitted_at   = null;

        $this->items         = [];
        $this->imageItem     = [];
        $this->titleItem     = [];
        $this->titleIdItem   = [];
        $this->captionItem   = [];
        $this->captionIdItem = [];

        $this->savedItems         = [];
        $this->itemId             = [];
        $this->savedOrderItem     = [];
        $this->savedImageItem     = [];
        $this->savedTitleItem     = [];
        $this->savedTitleIdItem   = [];
        $this->savedCaptionItem   = [];
        $this->savedCaptionIdItem = [];

        $this->tabLang = 'en';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $pageName = ucfirst((new Photo)->module);

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
                    $photos = Photo::orderBy($expSort[0],$expSort[1])->paginate($showDataTotal);
                } else {
                    $photos = Photo::descending()->paginate($showDataTotal);
                }

            } else {
                if($this->sortBy) {
                    $expSort = explode('-',$this->sortBy);
                    $photos = Photo::onlyTrashed()->orderBy($expSort[0],$expSort[1])->paginate($showDataTotal);
                } else {
                    $photos = Photo::onlyTrashed()->descending()->paginate($showDataTotal);
                }

            }
        } else {
            if($this->tab == 'index') {  
                $photos = Photo::where('title','like','%'.$this->search.'%')->descending()->paginate($showDataTotal);
            } else {
                $photos = Photo::onlyTrashed()->where('title','like','%'.$this->search.'%')->descending()->paginate($showDataTotal);
            }
        }

        foreach($photos as $key => $photo) {
            if($this->page && $this->page <> 1) {
                $current = $photos->currentpage();
                $perpage = $photos->perpage();
                $loop = ($current-1) * $perpage + 1 + $key;
            } else {
                $loop = $key+1;
            }
            $photo->no = $loop;
        }
        
        return view('livewire.backend.photos.index',compact('pageName',$this->module));

        $this->closeForm();
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $photo        = new Photo;
        $this->photo  = $photo;
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
        $photo                = Photo::findOrFail($id);
        $this->method         = 'PUT';
        $this->photoId        = $id;
        $this->photo          = $photo;
        $this->image          = $photo->image;
        $this->caption        = $photo->caption;
        $this->caption_id     = $photo->caption_id;
        $this->title          = $photo->title;
        $this->title_id       = $photo->title_id;
        $this->description    = $photo->description;
        $this->description_id = $photo->description_id;
        $this->active         = $photo->active;
        $this->submitted_at   = Carbon::parse($photo->submitted_at)->toFormattedDateString();
        $this->updated_at     = $photo->updated_at;


        $this->i             = 1;
        $this->items         = [];
        $this->imageItem     = [];
        $this->titleItem     = [];
        $this->titleIdItem   = [];
        $this->captionItem   = [];
        $this->captionIdItem = [];

        $this->savedItems         = PhotoItem::where('photo_id',$id)->ordering()->pluck('id');
        $this->itemId             = PhotoItem::where('photo_id',$id)->ordering()->pluck('id');
        $this->savedOrderItem     = PhotoItem::where('photo_id',$id)->ordering()->pluck('ordering_at');
        $this->savedImageItem     = PhotoItem::where('photo_id',$id)->ordering()->pluck('image');
        $this->savedTitleItem     = PhotoItem::where('photo_id',$id)->ordering()->pluck('title');
        $this->savedTitleIdItem   = PhotoItem::where('photo_id',$id)->ordering()->pluck('title_id');
        $this->savedCaptionItem   = PhotoItem::where('photo_id',$id)->ordering()->pluck('caption');
        $this->savedCaptionIdItem = PhotoItem::where('photo_id',$id)->ordering()->pluck('caption_id');

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
        ]);

        if(config('app.bilingual') == true) {
            $this->validate([
                'title_id'    => 'required',
            ]);
        }
        
        // image
        if($this->method == 'PUT' && $this->image == null) {
            $photo = Photo::find($this->photoId);
            Storage::disk('public')->delete($this->module.'/'.$photo->image);
        }
        if (count(collect($this->image)) > 1) {

            $this->validate([
                'image'     => 'nullable|mimes:jpg,png|max:100000',
            ]);
            
            // remove old image on put
            if($this->method == 'PUT') {
                $photo = Photo::find($this->photoId);
                Storage::disk('public')->delete($this->module.'/'.$photo->image);
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
            'user_id'        => auth()->user()->id,
            'category_id'    => $this->categoryId,
            'image'          => $putImage,
            'caption'        => $this->caption,
            'caption_id'     => $this->caption_id,
            'title'          => $this->title,
            'title_id'       => $this->title_id,
            'description'    => $this->description,
            'description_id' => $this->description_id,
            'active'         => ($this->active) ? 1 : 0,
            'submitted_at'   => $this->submitted_at ? $this->submitted_at : now(),
        ];

        if(Photo::updateOrCreate(['id' => $this->photoId], $input)) {

            if($this->method == 'POST') {
                $lastId = Photo::orderBy('id','desc')->first()->id;
            } else {
                $lastId = $this->photoId;
            }

            // create items
            if($this->items) {

                foreach($this->items as $key => $item) {

                    $this->validate([
                        'titleItem.'.$key => 'required',
                        'titleIdItem.'.$key => 'required',
                        'captionItem.'.$key => 'required',
                        'captionIdItem.'.$key => 'required',
                    ],
                    [
                        'titleItem.'.$key.'.required' => __('validation.required', array('attribute' => __('label.title.name'))),
                        'titleIdItem.'.$key.'.required' => __('validation.required', array('attribute' => __('label.title.name'))),
                        'captionItem.'.$key.'.required' => __('validation.required', array('attribute' => __('label.caption.name'))),
                        'captionIdItem.'.$key.'.required' => __('validation.required', array('attribute' => __('label.caption.name'))),
                    ]);
                
                    $parseImage = array_values($this->imageItem)[$key];

                    if (count(collect($parseImage)) > 1) {

                        $this->validate([
                            'imageItem.*' => 'nullable|image|max:50000',
                        ]);

                        $renameImage[$key]   = preg_replace('/\..+$/', '', $parseImage->getClientOriginalName());
                        $uploadImage[$key]   = Str::slug($renameImage[$key], '-') . '-' . Str::random(5) . '.' . $parseImage->getClientOriginalExtension();

                        $setImage = Image::make($parseImage->getRealPath());
                        $setImage->fit($this->width, $this->height, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                        $setImage->stream();

                        Storage::disk('public')->put($this->module.'/'.$this->photoId.'/'.$uploadImage[$key], $setImage, 'public');
                        
                        $putImage    = $uploadImage[$key];

                    } else {
                        $putImage    = $parseImage;
                    }


                    $inputItem = [
                        'ordering_at' => $key + 1,
                        'active'      => 1,
                        'photo_id'    => $lastId,
                        'image'       => $putImage,
                        'title'       => $this->titleItem[$key],
                        'title_id'    => $this->titleIdItem[$key],
                        'caption'     => $this->captionItem[$key],
                        'caption_id'  => $this->captionIdItem[$key],
                    ];
                    
                    PhotoItem::firstOrCreate($inputItem);

                }
            }

            // update items 
            if($this->savedItems) {
                foreach($this->savedItems as $key => $savedItem) {

                    $this->validate([
                        'savedOrderItem.'.$key    => 'required',
                        'savedTitleItem.'.$key  => 'required',
                        'savedTitleIdItem.'.$key  => 'required',
                        'savedCaptionItem.'.$key  => 'required',
                        'savedCaptionIdItem.'.$key  => 'required',
                    ],
                    [
                        'savedOrderItem.'.$key.'.required' => __('validation.required', array('attribute' => __('label.ordered.name'))),
                        'savedTitleItem.'.$key.'.required' => __('validation.required', array('attribute' => __('label.title.name'))),
                        'savedTitleIdItem.'.$key.'.required' => __('validation.required', array('attribute' => __('label.title.name'))),
                        'savedCaptionItem.'.$key.'.required' => __('validation.required', array('attribute' => __('label.caption.name'))),
                        'savedCaptionIdItem.'.$key.'.required' => __('validation.required', array('attribute' => __('label.caption.name'))),
                    ]);

                    $inputSavedItem = [
                        'ordering_at' => $this->savedOrderItem[$key],
                        'active'      => 1,
                        'photo_id'    => $lastId,
                        'title'       => $this->savedTitleItem[$key],
                        'title_id'    => $this->savedTitleIdItem[$key],
                        'caption'     => $this->savedCaptionItem[$key],
                        'caption_id'  => $this->savedCaptionIdItem[$key],
                    ];

                    PhotoItem::updateOrCreate(['id' => $this->itemId[$key]], $inputSavedItem);
                }
            }

            $this->photoId ? $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.updated',array('attribute' => (new Photo)->module))]) : $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.created',array('attribute' => (new Photo)->module))]);
            
            $this->items         = [];
            $this->imageItem     = [];
            $this->titleItem     = [];
            $this->titleIdItem   = [];
            $this->captionItem   = [];
            $this->captionIdItem = [];
    
            $this->savedItems         = PhotoItem::where('photo_id',$lastId)->ordering()->pluck('id');
            $this->itemId             = PhotoItem::where('photo_id',$lastId)->ordering()->pluck('id');
            $this->savedOrderItem     = PhotoItem::where('photo_id',$lastId)->ordering()->pluck('ordering_at');
            $this->savedImageItem     = PhotoItem::where('photo_id',$lastId)->ordering()->pluck('image');
            $this->savedTitleItem     = PhotoItem::where('photo_id',$lastId)->ordering()->pluck('title');
            $this->savedTitleIdItem   = PhotoItem::where('photo_id',$lastId)->ordering()->pluck('title_id');
            $this->savedCaptionItem   = PhotoItem::where('photo_id',$lastId)->ordering()->pluck('caption');
            $this->savedCaptionIdItem = PhotoItem::where('photo_id',$lastId)->ordering()->pluck('caption_id');

            if($this->onSave == 'exit') {
                $this->closeForm();
                $this->resetInputFields();
            }
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
        $photo  = Photo::findOrFail($id);

        $duplicate = $photo->replicate();
        $duplicate->title       = $photo->title.$copy;
        $duplicate->title_id    = $photo->title_id.$copy;
        $duplicate->active   = 0;
        $duplicate->image       = null;
        $duplicate->save();
   
        $this->emit('alert', ['type' => 'info', 'message' => __('validation.action.duplicated',array('attribute' => (new Photo)->module))]);
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
        Photo::withTrashed()->find($id)->restore();
        $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.restored',array('attribute' => (new Photo)->module))]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function addItem($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->items , $this->i);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function removeItem($item)
    {
        $i = $item - 1;
        $this->i = $i;
        unset($this->items[$item]);
        unset($this->imageItem[$item]);
        unset($this->titleItem[$item]);
        unset($this->captionItem[$item]);
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
        Photo::find($id)->delete();
        $this->emit('alert', ['type' => 'warning', 'message' => __('validation.action.archived',array('attribute' => (new Photo)->module))]);
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
        $photo = Photo::withTrashed()->find($id);
        if($photo->image) {
            Storage::disk('public')->delete($this->module.'/'.$photo->image);
        }
        $photoItems = PhotoItem::where('photo_id',$id)->get();
        foreach($photoItems as $photoItem) {
            Storage::disk('public')->delete($this->module.'/'.$photoItem->image);
        }
        $photo->forceDelete();
        $this->emit('alert', ['type' => 'error', 'message' => __('validation.action.destroyed',array('attribute' => (new Photo)->module))]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function reOrder($orderIds)
    {
        foreach($orderIds as $key => $orderId) {
            $photoItem = PhotoItem::find($orderId['value']);
            $input = [
                'ordering_at' => $orderId['order'],
            ];
            PhotoItem::updateOrCreate(['id' => $photoItem->id], $input);
        }
        
        $this->emit('alert', ['type' => 'success', 'message' => __('validation.action.ordered',array('attribute' => (new Photo)->module))]);
    }

    /**
     * Confirm that the user would like to delete their account.
     *
     * @return void
     */
    public function confirmDestroyItem($id)
    {
        $this->confirmDestroyItem = $id;
    }

    /**
     * Confirm that the user would like to delete their account.
     *
     * @return void
     */
    public function cancelDestroyItem($id)
    {
        $this->confirmDestroyItem = null;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function destroyItem($id, $key)
    {
        $photoItem = PhotoItem::find($id);

        if($photoItem) {
            Storage::disk('public')->delete($this->module.'/'.$this->photoId.'/'.$photoItem->image);
            $photoItem->delete();

            unset($this->itemId[$key]);
            unset($this->savedItems[$key]);
            unset($this->savedOrderItem[$key]);
            unset($this->savedImageItem[$key]);
            unset($this->savedTitleItem[$key]);
            unset($this->savedTitleIdItem[$key]);
            unset($this->savedCaptionItem[$key]);
            unset($this->savedCaptionIdItem[$key]);

            $this->emit('alert', ['type' => 'error', 'message' => __('validation.action.destroyed',array('attribute' => (new Photo)->module))]);
        }
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
    public function clearImage()
    {
        $this->image = null;
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
