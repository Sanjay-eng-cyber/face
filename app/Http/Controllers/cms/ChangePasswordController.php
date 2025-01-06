<?php

namespace App\Http\Controllers\cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function changePassword()
    {
        $user = Auth::guard('admin')->user('id');
        return view('backend.changePassword.index', ['user' => $user]);
    }

    public function passwordChange(Request $request, $id)
    {
        $cmsUser = Auth::guard('admin')->user();
        if ($cmsUser && $cmsUser->role === 'admin') {
            $validate = $request->validate([
                'name' => 'required|string|min:3|max:30',
                'email' => 'required|string|email:rfc,dns|min:5|max:40',
                'password' => ['nullable', 'confirmed', 'string', 'min:8', 'max:16'],
                'custom_domain_name' => 'nullable|string|min:3|max:50',
                'phone' => 'required|digits:10|numeric',
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
        } else {
            $validate = $request->validate([
                'name' => 'required|string|min:3|max:30',
                'email' => 'required|string|email:rfc,dns|min:5|max:40',
                'password' => ['nullable', 'confirmed', 'string', 'min:8', 'max:16'],
            ]);
        }
        $cmsUser->name = $request->name;
        $cmsUser->email = $request->email;
        if ($request->password) {
            $cmsUser->password = Hash::make($request->password);
        }


        if ($cmsUser->save()) {
            return redirect()->back()->with([
                "message" => "Profile updated Successfully",
                "alert-type" => "success"
            ]);
        } else {
            return redirect()->back()->with([
                "message" => "Something went wrong. Contact admin.",
                "alert-type" => "error"
            ]);
        }
    }
}
