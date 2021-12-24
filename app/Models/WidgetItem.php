<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Storage;
use DB;

class WidgetItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $module = 'widget_items';

    protected $appends = ['widget_items'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'widget_id',
        'image',
        'file',
        'caption',
        'caption_id',
        'title',
        'title_id',
        'description',
        'description_id',
        'active',
        'ordering_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

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
