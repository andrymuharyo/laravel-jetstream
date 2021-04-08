<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Fileable;
use Storage;
use DB;

class Data extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Fileable;

    protected $table = 'datas';

    public $module = 'datas';

    protected $appends = ['datas'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'parent_id',
        'category_id',
        'attachment',
        'title',
        'title_id',
        'url',
        'file',
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
    function getDatasAttribute()
    {
        //
    }

    /**
     *
     * @return UrlGenerator|mixed|string
     */
    public function getTypeUrlAttribute()
    {   
        if($this->attachment === 'file') {

            $href = $this->getFile('file');

        } else {

            $href = url($this->url);

        }
        return $href;
    }

    /**
     * @return hasMany
     */
    public function children()
    {
        return $this->hasMany(Data::class, 'parent_id', 'id')->ordering()->get();
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
