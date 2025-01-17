<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    function categories()
    {
        return $this->hasMany('App\Models\Category');
    }

    function galleryImages()
    {
        return $this->hasMany('App\Models\GalleryImage');
    }
}
