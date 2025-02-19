<?php

namespace App\Jobs;

use App\Models\Upload;
use App\Models\FrontendUser;
use App\Models\GalleryImage;
use App\Models\GuestUpload;
use App\Models\MatchedImage;
use App\View\Components\GuestLayout;
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
    public function __construct(public FrontendUser $frontend_user, public $image)
    {
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        // dd($this->upload, $this->image);
        $frontend_user = $this->frontend_user;
        $image = $this->image;

        if (
            empty($frontend_user->face_encoding) || empty($image->face_encoding) ||
            $frontend_user->face_encoding === '[]' || $image->face_encoding === '[]'
        ) {
            return false;
        }

        try {
            $frontendEncodings = json_decode($frontend_user->face_encoding, true);
            $imageEncodings = json_decode($image->face_encoding, true);
            $obj = null;
            if ($image instanceof GalleryImage) {
                $obj = GalleryImage::class;
            } elseif ($image instanceof GuestUpload) {
                $obj = GuestUpload::class;
            }

            if (!$obj) {
                return false;
            }

            if (json_last_error() !== JSON_ERROR_NONE) {
                Log::error('JSON Decode Error in face_encoding');
                return false;
            }

            $res = Http::post(config('app.python_api_url') . '/api/capture-input-image/', [
                'image_face_encodings' => $frontendEncodings,
                'gallery_face_encodings' => $imageEncodings,
            ]);
            $data = $res->json();
            // dd($data);
            // Log::info('Api Resp : ', $data);
            if ($res->successful()) {
                $status = $data['status'] ?? null;
                if (!$status) {
                    Log::info('CompareUploadedImagesForFaceMatching Status Err : ' . $data['error'] ?? '');
                    return false;
                }
                Log::info('Api Res : ', $data);
                if (isset($data['matched']) && in_array(true, $data['matched'])) {
                    $matched = new MatchedImage();
                    $matched->frontend_user_id = $frontend_user->id;
                    $matched->model_id = $image->id;
                    $matched->model_type = $obj;
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
