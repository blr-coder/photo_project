<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Album extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'date',

        'desktop_image',
        'mobile_image',

        'photographer',
        'location',
    ];

    /*public function photos()
    {
        return $this->hasMany(Photo::class);
    }*/

    public function delete()
    {
        if (!empty($this->desktop_image)) Storage::delete('/public/uploaded_images/albums/desktop/' . $this->desktop_image);
        if (!empty($this->mobile_image)) Storage::delete('/public/uploaded_images/albums/mobile/' . $this->mobile_image);

        return parent::delete();
    }
}
