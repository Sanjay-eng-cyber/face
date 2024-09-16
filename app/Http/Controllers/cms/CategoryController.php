<?php

namespace App\Http\Controllers\cms;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('backend.event.index', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.event.show', compact('category'));
    }

    public function create()
    {
        return view('backend.event.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|min:3|max:30',
            'visibility' => 'required|in:1,0',
            'sharing' => 'required|in:1,0',
        ]);

        // Create a new Event instance
        $event = new Category();
        $event->name = $request->name;
        $event->cms_user_id = auth()->user()->id;
        $event->slug =  Str::slug($request->name);
        $event->visibility = $request->visibility;
        $event->sharing = $request->sharing;
        if ($event->save()) {
            return redirect()->route('backend.categories.index')->with(
                [
                    "message" => "Category Added Successfully",
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
        $category = Category::findOrFail($id);
        return view('backend.event.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|min:3|max:30',
            'visibility' => 'required|in:1,0',
            'sharing' => 'required|in:1,0',
        ]);

        // Create a new Event instance
        $event = Category::findOrFail($id);
        $event->name = $request->name;
        $event->cms_user_id = auth()->user()->id;
        $event->slug =  Str::slug($request->name);
        $event->visibility = $request->visibility;
        $event->sharing = $request->sharing;
        if ($event->save()) {
            return redirect()->route('backend.categories.index')->with(
                [
                    "message" => "Category Update Successfully",
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
        $category = Category::findOrFail($id);
        if ($category->delete()) {
            return redirect()->route('backend.categories.index')->with(
                [
                    "message" => "Category Deleted Successfully",
                    "alert-type" => "success"
                ]
            );
        } else {
            return redirect()->route('backend.categories.index')->with(
                [
                    "message" => "Something Went Wrong",
                    "alert-type" => "error"
                ]
            );
        }
    }
}
