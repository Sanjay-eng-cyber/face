<?php

namespace App\Http\Controllers\cms;

use App\Models\CmsUser;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CmsUserController extends Controller
{
    public function index()
    {
        $cmsUsers = CmsUser::where('id', '!=', auth()->user()->id)->latest()->paginate(10);
        return view('backend.cms_user.index', compact('cmsUsers'));
    }

    public function show($id)
    {
        $cmsUser = CmsUser::where('id', '!=', auth()->user()->id)->findOrFail($id);
        $galleryImagesCount = GalleryImage::count();
        $eventsCount = $cmsUser->events()->count();
        // dd($eventsCount);
        return view('backend.cms_user.show', compact('cmsUser','galleryImagesCount','eventsCount'));
    }

    public function create()
    {
        return view('backend.cms_user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:30',
            'email' => 'required|string|email:rfc,dns|min:5|max:40',
            'password' => 'required|string|min:8|max:16',
            'role' => 'required|in:admin,super-admin',
            'custom_domain_name' => 'nullable|string|min:3|max:50',
            'phone' => 'nullable|digits:10|numeric',
            'plan' => 'nullable|in:1,2',
            'portfolio_website' => [
                'nullable',
                'string',
                'min:3',
                'max:50',
                'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'
            ],
            'vimeo_url' => [
                'nullable',
                'string',
                'min:3',
                'max:50',
                'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'
            ],
            'linkedin_url' => [
                'nullable',
                'string',
                'min:3',
                'max:50',
                'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'
            ],
            'facebook_url' => [
                'nullable',
                'string',
                'min:3',
                'max:50',
                'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'
            ],
            'youtube_url' => [
                'nullable',
                'string',
                'min:3',
                'max:50',
                'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'
            ],
            'instagram_url' => [
                'nullable',
                'string',
                'min:3',
                'max:50',
                'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'
            ],
            'twitter_url' => [
                'nullable',
                'string',
                'min:3',
                'max:50',
                'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'
            ],

        ]);

        // Create a new Event instance
        $cmsUser = new CmsUser();
        $cmsUser->name = $request->name;
        $cmsUser->email = $request->email;
        $cmsUser->password = Hash::make($request->password);
        $cmsUser->role = $request->role;
        $cmsUser->custom_domain_name = $request->custom_domain_name;
        $cmsUser->phone = $request->phone;
        $cmsUser->portfolio_website = $request->portfolio_website;
        $cmsUser->bio = $request->bio;
        $cmsUser->vimeo_url = $request->vimeo_url;
        $cmsUser->linkedin_url = $request->linkedin_url;
        $cmsUser->facebook_url = $request->facebook_url;
        $cmsUser->youtube_url = $request->youtube_url;
        $cmsUser->instagram_url = $request->instagram_url;
        $cmsUser->twitter_url = $request->twitter_url;

        if ($request->plan == 1) {
            $cmsUser->max_image_size = 5;
            $cmsUser->max_images_count = 100;
            $cmsUser->max_face_search = 5;
            $cmsUser->max_storage_limit = 50;
            $cmsUser->max_events = 1;
        } elseif ($request->plan == 2) {
            $cmsUser->max_image_size = 10;
            $cmsUser->max_images_count = 10000;
            $cmsUser->max_face_search = 25;
            $cmsUser->max_storage_limit = 10000;
            $cmsUser->max_events = 10;
        }
        if ($cmsUser->save()) {
            return redirect()->route('backend.cms-user.index')->with(
                [
                    "message" => "Cms User Added Successfully",
                    "alert-type" => "success"
                ]
            );
        } else {
            return redirect()->back()->with([
                "message" => "Something went wrong",
                "alert-type" => "error"
            ]);
        }
    }

    public function edit($id)
    {
        $cmsUser = CmsUser::where('id', '!=', auth()->user()->id)->findOrFail($id);
        return view('backend.cms_user.edit', compact('cmsUser'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|min:3|max:30',
            'email' => 'required|string|email:rfc,dns|min:5|max:40',
            'password' => 'required|string|min:8|max:16',
            'role' => 'required|in:admin,super-admin',
            'custom_domain_name' => 'nullable|string|min:3|max:50',
            'phone' => 'nullable|digits:10|numeric',
            'plan' => 'nullable|in:1,2',
            'portfolio_website' => [
                'nullable',
                'string',
                'min:3',
                'max:50',
                'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'
            ],
            'vimeo_url' => [
                'nullable',
                'string',
                'min:3',
                'max:50',
                'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'
            ],
            'linkedin_url' => [
                'nullable',
                'string',
                'min:3',
                'max:50',
                'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'
            ],
            'facebook_url' => [
                'nullable',
                'string',
                'min:3',
                'max:50',
                'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'
            ],
            'youtube_url' => [
                'nullable',
                'string',
                'min:3',
                'max:50',
                'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'
            ],
            'instagram_url' => [
                'nullable',
                'string',
                'min:3',
                'max:50',
                'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'
            ],
            'twitter_url' => [
                'nullable',
                'string',
                'min:3',
                'max:50',
                'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'
            ],

        ]);

        // Create a new Event instance
        $cmsUser = CmsUser::where('id', '!=', auth()->user()->id)->findOrFail($id);
        $cmsUser->name = $request->name;
        $cmsUser->email = $request->email;
        $cmsUser->role = $request->role;
        $cmsUser->password = Hash::make($request->password);
        $cmsUser->custom_domain_name = $request->custom_domain_name;
        $cmsUser->phone = $request->phone;
        $cmsUser->portfolio_website = $request->portfolio_website;
        $cmsUser->bio = $request->bio;
        $cmsUser->vimeo_url = $request->vimeo_url;
        $cmsUser->linkedin_url = $request->linkedin_url;
        $cmsUser->facebook_url = $request->facebook_url;
        $cmsUser->youtube_url = $request->youtube_url;
        $cmsUser->instagram_url = $request->instagram_url;
        $cmsUser->twitter_url = $request->twitter_url;

        if ($request->plan == 1) {
            $cmsUser->max_image_size = 5;
            $cmsUser->max_images_count = 100;
            $cmsUser->max_face_search = 5;
            $cmsUser->max_storage_limit = 50;
            $cmsUser->max_events = 1;
        } elseif ($request->plan == 2) {
            $cmsUser->max_image_size = 10;
            $cmsUser->max_images_count = 10000;
            $cmsUser->max_face_search = 25;
            $cmsUser->max_storage_limit = 10000;
            $cmsUser->max_events = 10;
        }
        if ($cmsUser->save()) {
            return redirect()->route('backend.cms-user.index')->with(
                [
                    "message" => "Cms User Update Successfully",
                    "alert-type" => "success"
                ]
            );
        } else {
            return redirect()->back()->with([
                "message" => "Something went wrong",
                "alert-type" => "error"
            ]);
        }
    }

    public function delete($id)
    {
        $cmsUser = CmsUser::where('id', '!=', auth()->user()->id)->findOrFail($id);
        if ($cmsUser->delete()) {
            return redirect()->route('backend.cms-user.index')->with(
                [
                    "message" => "Cms User Deleted Successfully",
                    "alert-type" => "success"
                ]
            );
        } else {
            return redirect()->route('backend.cms-user.index')->with(
                [
                    "message" => "Something Went Wrong",
                    "alert-type" => "error"
                ]
            );
        }
    }
}
