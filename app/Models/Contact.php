<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Imageable;
use Storage;
use DB;

class Contact extends Model
{
    use HasFactory;
    use Imageable;

    public $table = 'contact';

    public $module = 'contact';

    protected $appends = ['contact'];

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
        'address',
        'phone',
        'email',
        'email_inquiry',
        'embed',
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
    function getContactAttribute()
    {
        //
    }
    
}
