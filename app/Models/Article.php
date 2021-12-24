<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Imageable;
use Storage;
use DB;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Imageable;

    public $module = 'articles';

    protected $appends = ['articles'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'image',
        'caption',
        'caption_id',
        'privacy',
        'categories',
        'keywords',
        'title',
        'title_id',
        'slug',
        'slug_id',
        'intro',
        'intro_id',
        'description',
        'description_id',
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
     * @return attribute
     */
    function getArticlesAttribute()
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
