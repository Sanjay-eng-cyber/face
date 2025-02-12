<?php

namespace App\Listeners;

use App\Models\Event;
use App\Models\GalleryImage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Jobs\CompareUploadedImagesForFaceMatching;
use App\Events\CategoryUploadedImageFaceMatchingRequestedEvent;

class CategoryUploadedImageFaceMatchingRequestedListener implements ShouldQueue
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
    public function handle(CategoryUploadedImageFaceMatchingRequestedEvent $event): void
    {
        // dd($event);
        $frontend_user = $event->frontend_user;
        $category = $event->category;
        $event = Event::findOrFail($frontend_user->event_id);
        $gallery_images = GalleryImage::where('event_id', $event->id)->where('category_id', $category->id)->get();
        foreach ($gallery_images as $gallery_image) {
            CompareUploadedImagesForFaceMatching::dispatch($frontend_user, $gallery_image);
        }
    }
}
