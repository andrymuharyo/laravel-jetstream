<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Imageable;
use Storage;
use DB;

class Keyword extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Imageable;

    public $module = 'keywords';

    protected $appends = ['keywords'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'unique_id',
        'title',
        'title_id',
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
    function getKeywordsAttribute()
    {
        //
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
