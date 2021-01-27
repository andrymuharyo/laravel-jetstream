<?php
namespace App\Traits;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

/**
 * Trait Imageable
 *
 * @package App\Traits
 */
trait Imageable
{
    /**
     * Get the image file url if exist
     *
     * @param null $attribute
     * @return string relation
     */
    public function getImage($attribute)
    {
        if (! $this->hasImage($attribute)) {
            return null;
        }

        return Storage::disk('public')->url($this->module.'/'.$this->{$attribute});
    }

    /**
     * Check whether image file exist by the given attribute name
     *
     * @param $attribute
     * @return mixed
     */
    public function hasImage($attribute)
    {
        return Storage::disk('public')->exists($this->module.'/'.$this->{$attribute});
    }

    /**
     * Check whether image file exist by the given attribute name
     *
     * @param $attribute
     * @return bool|void
     */
    public function deleteImage($attribute)
    {
        if (! $this->hasImage($attribute)) {
            return true;
        }

        return Storage::disk('public')->delete($this->module.'/'.$this->{$attribute});
    }
}
