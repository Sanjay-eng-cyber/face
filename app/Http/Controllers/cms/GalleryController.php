<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Gallery;
use App\Models\Event;

class GalleryController extends Controller
{
  
    public function index(Request $request)
    {
        // Retrieve the event ID from the request
        $eventId = $request->input('eventId');

        // Retrieve the event based on the event ID
        $event = Event::find($eventId);
       

        return view('backend.gallery.index', compact('event'));
    }

  
    // public function create()
    // {
    //     return view('galleries.create');
    // }

    
    
    public function store(Request $request)
    {
   // dd($request->all());
        $request->validate([
            'image_name.*' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', 
        ]);

        try {
            $responseDataArray = [];
        
            foreach ($request->file('image_name') as $image) {
                $mainImgFilename = $image->getClientOriginalName();
                $response = Http::attach(
                    'images',  
                    file_get_contents($image->getRealPath()), 
                    $mainImgFilename // File name
                )->post('http://127.0.0.1:8000/inputimg/', [
                    'user_id' => $request->user_id,
                    'event_id' => $request->event_id,
                ]);
            
                $responseData = $response->json();
                dd($responseData);
                $responseDataArray[] = $responseData;
            }
            
        
            return view('upload.index', ['responseDataArray' => $responseDataArray]);
        } catch (\Exception $e) {
            return view('upload_error', ['error' => $e->getMessage()]);
        }
        


    }
}
