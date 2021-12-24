<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Navigation;
use App\Models\Content;
use Storage;
use DB;

class Navigation extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $module = 'navigations';

    protected $appends = ['navigations'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'parent_id',
        'type',
        'target',
        'title',
        'title_id',
        'intro',
        'intro_id',
        'url',
        'uri',
        'content_id',
        'active',
        'ordering_at',
        'submitted_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'submitted_at',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    /**
     * @return hasMany
     */
    public function children()
    {
        return $this->hasMany(Navigation::class, 'parent_id', 'id')->ordering()->get();
    }

    /**
     * @return attribute
     */
    function getNavigationsAttribute()
    {
        //
    }

    /**
     * @return scope
     */
    public function scopeActive($query)
    {
        return $query->where('active',1);
    }

    /**
     * @return scope
     */
    public function scopeDraft($query)
    {
        return $query->where('active',0);
    }

    /**
     *
     * @return UrlGenerator|mixed|string
     */
    public function getTypeUrlAttribute()
    {   
        if($this->type === 'uri') {

            $href = url($this->uri);

        } else if($this->type === 'url') {

            $href = $this->url;

        } else if($this->type === 'content') {

            $content = Content::find($this->content_id);
            if(app()->getLocale() == 'en') {
                $href  = route('frontend.content',$content->slug);
            } else {
                $href  = route('frontend.content',$content->slug_id);
            }

        }
        return $href;
    }

    /**
     * @return scope
     */
    public function scopeAscending($query)
    {
        return $query->orderBy('submitted_at', 'asc');
    }

    /**
     * @return scope
     */
    public function scopeDescending($query)
    {
        return $query->orderBy('submitted_at', 'desc');
    }

    /**
     * @return scope
     */
    public function scopeOrdering($query)
    {
        return $query->orderBy(DB::raw('ABS(ordering_at)'),'asc');
    }
    
}
