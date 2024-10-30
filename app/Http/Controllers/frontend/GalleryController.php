<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index($event_id, $category_id)
    {
        $gallery_images = GalleryImage::with(['event', 'category'])
            ->where('category_id', $category_id)
            ->where('event_id', $event_id)
            ->latest()
            ->paginate(10);
        // dd($gallery_images);
        return view('frontend.gallery.index', compact('gallery_images'));
    }
}
