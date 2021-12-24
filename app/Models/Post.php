<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Imageable;
use Storage;
use DB;

class Post extends Model
{
    use HasFactory;
    use Imageable;

    public $module = 'posts';

    protected $appends = ['posts'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'title_id',
        'description',
        'description_id',
        'button',
        'button_id',
        'url'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * @return attribute
     */
    function getOverviewAttribute()
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
    
}
