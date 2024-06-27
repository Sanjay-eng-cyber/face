<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Add this line

class UploadController extends Controller
{
    public function index()
    {
        return view('backend.upload.index');
    }


    public function show($eventid)
    {
        // dd($eventid);
        return view('backend.upload.index',compact('eventid'));

    }

    // return view('backend.upload.index');

    public function store(Request $request)
    {
    // dd($request->all());

    
      //dd($request->all());
      $request->validate([
        'imageUpload' => 'nullable|image|mimes:jpeg,png,jpg,jfif|max:2048',
    ]);

    if ($request->hasFile('imageUpload')) {
        $mainImgFilename = now()->format('dmy-his') . '-' . rand(1, 99) . '.' . $request->file('imageUpload')->getClientOriginalExtension();
        $eventid = $request->input('eventid'); // Get event ID from the request

        try {
            $response = Http::attach('imageUpload', fopen($request->file('imageUpload')->getRealPath(), 'r'), $mainImgFilename)
                ->post('http://127.0.0.1:8000/capture/', [
                    'eventid' => $eventid // Pass eventid here
                ]);

            $responseData = $response->json();
            return view('upload_success', ['responseData' => $responseData]);

        } catch (\Exception $e) {
            return view('upload_error', ['error' => $e->getMessage()]);
        }
    } else {
        return view('upload_error', ['error' => 'No image uploaded.']);
    }



    if ($request->hasFile('imageData')) {
        
        $imageData = $request->input('imageData');  

        try {
            $response = Http::attach(
                'imageData', 
                file_get_contents($request->file('imageData')->getRealPath()), 
                $imageData
            )->post('http://127.0.0.1:8000/capture/');

            $responseData = $response->json();
            return view('upload_success', ['responseData' => $responseData]);

        } catch (\Exception $e) {
            // Handle exceptions
            return view('upload_error', ['error' => $e->getMessage()]);
        }
        
    }

        return redirect()->back()->with('error', 'No image data provided.');
    }

    

}