<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontendUser extends Model
{
    use HasFactory;

    function matchedImages()
    {
        return $this->hasMany('App\Models\MatchedImage');
    }

    function guestUploads()
    {
        return $this->hasMany('App\Models\GuestUpload');
    }
}
