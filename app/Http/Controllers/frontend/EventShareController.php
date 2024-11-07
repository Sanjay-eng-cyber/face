<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventShareController extends Controller
{
    public function index()
    {
        return view('frontend.dynamic.event-share');
    }
}
