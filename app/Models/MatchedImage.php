<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchedImage extends Model
{
    use HasFactory;

    public function galleryImage()
    {
        return $this->belongsTo(GalleryImage::class, 'gallery_image_id');
    }
}
