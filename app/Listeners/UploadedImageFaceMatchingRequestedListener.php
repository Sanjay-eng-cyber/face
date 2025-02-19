<?php

namespace App\Listeners;

use App\Models\Event;
use App\Models\Category;
use App\Models\GalleryImage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Jobs\CompareUploadedImagesForFaceMatching;
use App\Events\UploadedImageFaceMatchingRequestedEvent;
use App\Models\GuestUpload;

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
        $frontend_user = $event->frontend_user;
        $event = Event::findOrFail($frontend_user->event_id);
        $galleryQuery = GalleryImage::where('event_id', $event->id);
        $guestQuery = GuestUpload::where('event_id', $event->id);

        if (!empty($frontend_user->last_synced)) {
            $galleryQuery->where('created_at', '>=', $frontend_user->last_synced);
            $guestQuery->where('created_at', '>=', $frontend_user->last_synced);
        }

        $gallery_images = $galleryQuery->get();
        foreach ($gallery_images as $gallery_image) {
            CompareUploadedImagesForFaceMatching::dispatch($frontend_user, $gallery_image);
        }

        $guest_uploads = $guestQuery->get();
        foreach ($guest_uploads as $guest_upload) {
            CompareUploadedImagesForFaceMatching::dispatch($frontend_user, $guest_upload);
        }
    }
}
