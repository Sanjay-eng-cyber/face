<?php

namespace App\Listeners;

use App\Models\Event;
use App\Models\Category;
use App\Models\GalleryImage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Jobs\CompareUploadedImagesForFaceMatching;
use App\Events\UploadedImageFaceMatchingRequestedEvent;

class UploadedImageFaceMatchingRequestedListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UploadedImageFaceMatchingRequestedEvent $event): void
    {
        // dd($event);
        sleep(10);
        $frontend_user = $event->frontend_user;
        $event = Event::findOrFail($frontend_user->event_id);
        // $category = Category::where('event_id', $event->id)->findOrFail($upload->category_id);
        // $gallery_images = GalleryImage::where('event_id', $event->id)->where('category_id', $category->id)->get();
        $gallery_images = GalleryImage::where('event_id', $event->id)->get();
        foreach ($gallery_images as $gallery_image) {
            CompareUploadedImagesForFaceMatching::dispatch($frontend_user, $gallery_image);
        }
    }
}
