<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Imageable;
use App\Traits\Fileable;
use Storage;
use DB;

class Widget extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Imageable;
    use Fileable;

    public $module = 'widgets';

    protected $appends = ['widgets'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'model_id',
        'type',
        'image',
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
     * @return attribute
     */
    function getWidgetsAttribute()
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
     * @return hasMany
     */
    public function items()
    {
        return $this->hasMany(WidgetItem::class, 'widget_id', 'id')->ordering()->get();
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
