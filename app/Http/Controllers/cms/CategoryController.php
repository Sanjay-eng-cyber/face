<?php

namespace App\Http\Controllers\cms;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::latest();
        $categories = $this->filterResults($request, $categories);
        $categories = $categories->paginate(10);
        return view('backend.category.index', compact('categories'));
    }

    protected function filterResults($request, $categories)
    {
        if ($request->q !== '' && !is_null($request->q)) {
            $request->validate([
                'q' => 'nullable|string|min:3|max:40',
            ], [
                'q.min' => 'Name must be at least 3 characters.',
                'q.max' => 'Name may not be greater than 40 characters.',
            ]);
        }

        if ($request !== null && $request->has('q') && $request['q'] !== '') {
            $search = $request['q'];

            $categories = $categories->where('name', 'LIKE', '%' . $search . '%');
        }
        return $categories;
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.show', compact('category'));
    }

    public function create()
    {
        $events = Event::all();
        return view('backend.category.create', compact('events'));
    }

    public function store(Request $request)
    {
        $events = Event::pluck('id')->toArray();
        $request->validate([
            'name' => 'required|string|min:3|max:30',
            'event_id' => ['required', Rule::in($events)],
            'visibility' => 'required|in:1,0',
            'sharing' => 'required|in:1,0',
        ]);

        // Create a new Event instance
        $event = new Category();
        $event->name = $request->name;
        $event->cms_user_id = auth()->user()->id;
        $event->slug = Str::slug($request->name);
        $event->visibility = $request->visibility;
        $event->event_id = $request->event_id;
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
        $events = Event::all();
        return view('backend.category.edit', compact('category', 'events'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $events = Event::pluck('id')->toArray();
        $request->validate([
            'name' => 'required|string|min:3|max:30',
            'event_id' => ['required', Rule::in($events)],
            'visibility' => 'required|in:1,0',
            'sharing' => 'required|in:1,0',
        ]);

        // Create a new Event instance
        $event = Category::findOrFail($id);
        $event->name = $request->name;
        $event->event_id = $request->event_id;
        $event->cms_user_id = auth()->user()->id;
        $event->slug = Str::slug($request->name);
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

    public function uploadImages(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $event = Event::findOrFail($category->event_id);
        // dd($category, $event);
        return view('backend.category.upload-images', compact('category', 'event'));
    }
}
