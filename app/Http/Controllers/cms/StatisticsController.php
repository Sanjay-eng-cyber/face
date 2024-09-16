<?php

namespace App\Http\Controllers\cms;

use App\Models\User;
use App\Models\Event;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticsController extends Controller
{
    public function index()
    {
        $users = User::count();
        $totalEvents = Event::count();
        return view('backend.statistics.index', compact('users', 'totalEvents'));
    }
}
