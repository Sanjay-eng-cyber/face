<?php

namespace App\Jobs;

use App\Models\Event;
use App\Models\GuestUpload;
use App\Models\FrontendUser;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Intervention\Image\ImageManager;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class StoreGuestUploadedImage implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Event $event, public FrontendUser $frontend_user, public $fileContent, public $fileExt)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $event = $this->event;
        $frontend_user = $this->frontend_user;
        $fileContent = $this->fileContent;
        $fileExt = $this->fileExt;

        $destinationPath = public_path("storage/images/uploads/");
        $filename = date('Ymd-his') . "." . uniqid() . "." . $fileExt;

        $imageData = base64_decode($fileContent);
        $manager = ImageManager::gd();
        $imageInstance = $manager->read($imageData);
        $destinationPath = public_path("storage/images/galleries/{$event->slug}/guest_uploaded_images/");

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0777, true, true);
        }

        $imageInstance->save($destinationPath . '/' . $filename, 90);

        $res = Http::attach(
            'image_name', // The name of the file field in the request
            file_get_contents($destinationPath . $filename), // The file's content
            $filename, // The file name
            ['Content-Type' => 'image/jpeg']
        )->post(config('app.python_api_url') . '/inputimg/');

        if ($res->successful()) {
            // dd($res);
            $data = $res->json();
            $status = $data['status'] ?? null;
            if ($status !== true) {
                Log::info("Something Went Wrong From API");
                return;
            }
            $face_encoding = $data['face_encoding'] ?? null;
            $face_locations = $data['face_locations'] ?? null;

            $guestUpload = new GuestUpload();
            $guestUpload->event_id = $frontend_user->event_id;
            $guestUpload->frontend_user_id = $frontend_user->id;
            $guestUpload->image_name = $filename;
            $guestUpload->image_url = "images/galleries/{$event->slug}/guest_uploaded_images/{$filename}";
            $guestUpload->face_encoding = $face_encoding;
            $guestUpload->face_locations = $face_locations;

            if ($guestUpload->save()) {
                Log::info("Guest Image Stored Successfully");
            } else {
                Log::error("Guest Image Not Stored");
            }
        }
    }
}
