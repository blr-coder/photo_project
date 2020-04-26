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
        if (!empty($this->image)) Storage::delete('/public/uploaded_images/albums/' . $this->image);

        return parent::delete();
    }
}
