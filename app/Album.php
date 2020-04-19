<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'date',

        'image',

        'photographer',
        'location',
    ];

    /*public function photos()
    {
        return $this->hasMany(Photo::class);
    }*/
}
