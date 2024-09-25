<?php

namespace App\Http\Controllers\cms;

use App\Models\CmsUser;
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
        return view('backend.cms_user.show', compact('cmsUser'));
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
        ]);

        // Create a new Event instance
        $cmsUser = new CmsUser();
        $cmsUser->name = $request->name;
        $cmsUser->email = $request->email;
        $cmsUser->password = Hash::make($request->password);
        $cmsUser->role = $request->role;
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
        ]);

        // Create a new Event instance
        $cmsUser = CmsUser::where('id', '!=', auth()->user()->id)->findOrFail($id);
        $cmsUser->name = $request->name;
        $cmsUser->email = $request->email;
        $cmsUser->role = $request->role;
        $cmsUser->password = Hash::make($request->password);
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
