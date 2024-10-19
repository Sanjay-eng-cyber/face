<?php

namespace App\Http\Controllers\cms;

use App\Models\User;
use App\Models\Event;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CmsUser;

class StatisticsController extends Controller
{
    public function index()
    {
        // dd(request()->route()->getName());
        $totalUsers = User::count();
        $totalEvents = Event::count();
        $totalCategories = Category::count();
        $totalCmsUsers = CmsUser::count();
        return view('backend.statistics.index', compact('totalUsers', 'totalEvents', 'totalCategories', 'totalCmsUsers'));
    }
}
