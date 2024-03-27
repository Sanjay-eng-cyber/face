<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Upload;
class GalleryController extends Controller
{
    public function index()
    {
        return view('frontend.gallery.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Max 2MB per image

        ]);
    
        // Storage::makeDirectory('public/images/upload/');
        if ($request->hasFile('images')) {
            // foreach ($request->file('images') as $image) {
            //     $filename = $image->getClientOriginalName();
            //     // dd($filename);
            //     $path = $image->storeAs('public/images/upload/', $filename);
            //     $upload = new Upload(); 
            //     $upload->images = $filename;
            //     $upload->save();
            // }
    
            try {
                $responseDataArray = [];
    
                foreach ($request->file('images') as $image) {
                    $mainImgFilename = $image->getClientOriginalName();
                    $response = Http::attach(
                        'images',  
                        file_get_contents($image->getRealPath()), 
                        $mainImgFilename // File name
                    )->post('http://127.0.0.1:8000/inputimg/');
    
                    $responseData = $response->json();
                    $responseDataArray[] = $responseData;
                }
    
                return view('upload.index', ['responseDataArray' => $responseDataArray]);
    
            } catch (\Exception $e) {
                return view('upload_error', ['error' => $e->getMessage()]);
            }
        } else {
            return redirect()->back()->with('error', 'No images uploaded.');
        }
    }
    
    public function capture()
    {
        return view('capture');
    }

    public function capturestore(Request $request)
    {
      
      
      //  dd($request->all());

        $request->validate([
            'imageUpload' => 'nullable|image|mimes:jpeg,png,jpg,jfif|max:2048', 
        ]);
    
        if ($request->hasFile('imageUpload')) {
            $mainImgFilename = now()->format('dmy-his') . '-' . rand(1, 99) . '.' . $request->file('imageUpload')->getClientOriginalExtension();
    
            try {
                $response = Http::attach(
                    'imageUpload', 
                    file_get_contents($request->file('imageUpload')->getRealPath()),
                    $mainImgFilename 
                )->post('http://127.0.0.1:8000/capture/');
                $responseData = $response->json();
                    return view('upload_success', ['responseData' => $responseData]);
    
            } catch (\Exception $e) {
                return view('upload_error', ['error' => $e->getMessage()]);
            }
        }
    
        // if ($request->filled('imageData')) {
            
        //     $imageData = $request->input('imageData');  

        //     try {
        //         $response = Http::attach(
        //             'imageData', 
        //             file_get_contents($request->file('imageData')->getRealPath()), 
        //             $imageData
        //         )->post('http://127.0.0.1:8000/capture/');
    
        //         $responseData = $response->json();
        //         return view('upload_success', ['responseData' => $responseData]);
    
        //     } catch (\Exception $e) {
        //         // Handle exceptions
        //         return view('upload_error', ['error' => $e->getMessage()]);
        //     }
            
        // }
    
        return redirect()->back()->with('error', 'No image data provided.');
    }
    



    

    
}
