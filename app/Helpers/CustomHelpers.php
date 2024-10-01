<?php

use App\Models\Tag;
use App\Models\Cart;
use App\Models\Product;
use Seshac\Shiprocket\Shiprocket;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;



/**
 * Default date time format
 */

if (!function_exists('dd_format')) {
    function dd_format($value, $format = 'd-m-Y h:i a')
    {
        return date($format, strtotime($value));
    }
}

if (!function_exists('tableRowSrNo')) {

    function tableRowSrNo($index, $paginator)
    {
        return $index + 1 + (($paginator->currentPage() - 1) * $paginator->perPage());
        // return $index + 1 + (($paginator->resolveCurrentPage() - 1) * $paginator->perPage());
    }
}

if (!function_exists('str_limit')) {
    function str_limit($title, $value = 21)
    {
        return \Illuminate\Support\Str::limit($title, $value, '...');
    }
}


if (!function_exists('toast')) {
    /**
     ** Toastr alerts
     * @param string $message
     */
    function toast($message, $type = 'success')
    {
        return [
            "message" => $message,
            "alert-type" => $type,
        ];
    }
}

if (!function_exists('getPreviousRoute')) {
    /**
     ** remove "00" suffix from amount returned by api and convert to int
     * @param string $amount
     * @return int
     */
    function getPreviousRoute()
    {
        return app('router')->getRoutes(url()->previous())->match(app('request')->create(url()->previous()))->getName();
    }
}

if (!function_exists('uploadFile')) {
    function uploadFile($file, $location, $width = 600, $height = null, $quality = 85)
    {
        $fileWithExt = $file;
        $extension = $fileWithExt->clientExtension();
        $filename = date('Ymd-his') . "." . uniqid() . "." . $fileWithExt->clientExtension();
        $destinationPath = storage_path('app/public/' . $location . '/');
        if (in_array($extension, ['png', 'jpg', 'jpeg'])) {
            $manager = ImageManager::gd();
            $image = $manager->read($fileWithExt->getRealPath())->scale($width, $height);
            $image->save($destinationPath . $filename, $quality);
            $extension = 'image';
        } else {
            Storage::disk('public')->put($location . '/' . $filename, file_get_contents($fileWithExt));
        }
        return ['filename' => $filename, 'type' => $extension];
    }
}

if (!function_exists('saveImage')) {
    function saveImage($file, $destinationPath, $width = 600, $height = null, $quality = 85)
    {
        // dd($width, $height);
        $filename = date('Ymd-his') . "." . uniqid() . "." . $file->clientExtension();
        $manager = ImageManager::gd();
        $image = $manager->read($file->getRealPath());
        $image->scale($width, $height);
        $image->save($destinationPath . $filename, $quality);
        return $filename;
    }
}

if (!function_exists('getYoutubeEmbedUrl')) {

    function getYoutubeEmbedUrl($url)
    {
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';
        $youtube_id = '';
        if (preg_match($longUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        return 'https://www.youtube.com/embed/' . $youtube_id;
    }
}
if (!function_exists('highlightHeading')) {

    function highlightHeading($s)
    {
        $s = str_replace("(", "<span class='featured text-primary'>", $s);
        $s = str_replace(")", "</span>", $s);
        return $s;
    }
}
if (!function_exists('replaceBracket')) {

    function replaceBracket($s)
    {
        $s = str_replace("(", "", $s);
        $s = str_replace(")", "", $s);
        return $s;
    }
}

/**
 *  Generate 8 character random string
 */

if (!function_exists('struniq')) {
    function struniq()
    {
        return substr(uniqid(), 11) . rand(10, 99) . substr(strtotime(now()), 6);
    }
}

if (!function_exists('getPythonImageUrl')) {
    function getPythonImageUrl($loc)
    {
        return config('app.python_media_url') . $loc;
    }
}

if (!function_exists('getGalleryImageUrl')) {
    function getGalleryImageUrl($loc)
    {
        return asset('storage') . '/' . $loc;
    }
}


