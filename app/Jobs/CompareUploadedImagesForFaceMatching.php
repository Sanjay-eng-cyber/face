<?php

namespace App\Jobs;

use App\Models\FrontendUser;
use App\Models\Upload;
use App\Models\GalleryImage;
use App\Models\MatchedImage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CompareUploadedImagesForFaceMatching implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public FrontendUser $frontend_user, public GalleryImage $gallery_image)
    {
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        // dd($this->upload, $this->gallery_image);
        $frontend_user = $this->frontend_user;
        $gallery_image = $this->gallery_image;

        if (!$frontend_user->face_encoding || !$gallery_image->face_encoding || $frontend_user->face_encoding == '[]' || $gallery_image->face_encoding == '[]') {
            return false;
        }

        try {
            $res = Http::post(config('app.python_api_url') . '/api/capture-input-image/', [
                'image_face_encodings' => json_decode($frontend_user->face_encoding),
                'gallery_face_encodings' => json_decode($gallery_image->face_encoding)
            ]);
            $data = $res->json();
            // dd($data);
            if ($res->successful()) {
                $status = $data['status'] ?? null;
                if (!$status) {
                    Log::info('CompareUploadedImagesForFaceMatching Status Err : ' . $data['error'] ?? '');
                    return 0;
                }

                if ($data['matched'] == true) {
                    $matched = new MatchedImage();
                    $matched->frontend_user_id = $frontend_user->id;
                    $matched->gallery_image_id = $gallery_image->id;
                    $matched->save();
                }
                return true;
            }
        } catch (\Throwable $th) {
            Log::info('CompareUploadedImagesForFaceMatching Catch Err : ' . $th->getMessage());
            return 0;
        }
    }
}
