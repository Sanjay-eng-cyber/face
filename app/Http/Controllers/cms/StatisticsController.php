<?php

namespace App\Http\Controllers\cms;

use App\Models\User;
use App\Models\Event;
use App\Models\CmsUser;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StatisticsController extends Controller
{
    public function index()
    {
        $user = Auth::guard('admin')->user('id');
        if ($user->role == 'admin') {
            $totalEvents = Event::where('cms_user_id', $user->id)->count();
        } else {
            $totalEvents = Event::count();
        }
        $totalCategories = Category::count();
        $totalCmsUsers = CmsUser::count();
        return view('backend.statistics.index', compact('totalEvents', 'totalCategories', 'totalCmsUsers'));
    }
}
