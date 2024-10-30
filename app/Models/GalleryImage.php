<?php

namespace App\Models;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GalleryImage extends Model
{
    use HasFactory;
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
