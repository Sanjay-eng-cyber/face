<?php

namespace App\Jobs;

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
    public function __construct(public Upload $upload, public GalleryImage $gallery_image)
    {
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        // dd($this->upload, $this->gallery_image);
        $upload = $this->upload;
        $gallery_image = $this->gallery_image;

        if (!$upload->face_encoding || !$gallery_image->face_encoding || $upload->face_encoding == '[]' || $gallery_image->face_encoding == '[]') {
            return false;
        }

        try {
            $res = Http::post(config('app.python_api_url') . '/api/capture-input-image/', [
                'image_face_encodings' => $upload->face_encoding,
                'gallery_face_encodings' => $gallery_image->face_encoding
            ]);
            $data = $res->json();
            // dd($data);
            if ($res->successful()) {
                $status = $data['status'] ?? null;
                if (!$status) {
                    Log::info('CompareUploadedImagesForFaceMatching Status Err : ' . $data['error'] ?? '');
                    return false;
                }

                if ($data['matched'] ?? null) {
                    $matched = new MatchedImage();
                    $matched->upload_id = $upload->id;
                    $matched->gallery_image_id = $gallery_image->id;
                    $matched->save();
                }
                return true;
            }
        } catch (\Throwable $th) {
            Log::info('CompareUploadedImagesForFaceMatching Catch Err : ' . $th->getMessage());
            return false;
        }
    }
}
