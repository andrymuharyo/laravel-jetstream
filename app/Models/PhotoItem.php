<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Imageable;
use App\Traits\Fileable;
use Storage;
use DB;

class PhotoItem extends Model
{
    use HasFactory;
    use Imageable;
    use Fileable;

    public $module = 'photo_items';

    protected $appends = ['photo_items'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'photo_id',
        'image',
        'caption',
        'caption_id',
        'title',
        'title_id',
        'active',
        'ordering_at'
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
     * @return scope
     */
    public function scopeAscending($query)
    {
        return $query->orderBy('created_at', 'asc');
    }

    /**
     * @return scope
     */
    public function scopeDescending($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * @return scope
     */
    public function scopeOrdering($query)
    {
        return $query->orderBy(DB::raw('ABS(ordering_at)'),'asc');
    }
    
}
