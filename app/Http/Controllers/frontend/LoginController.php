<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest:admin')->except('logout');
    // }

    public function loginShow()
    {
        // dd('jhugu');
        return view('frontend.login');
    }

    public function login(Request $request)
    {
        // dd($request);
        $request->validate([
            'email' => ['required', 'email', 'min:8', 'max:30'],
            'password' => ['required', 'string', 'min:8', 'max:16']
        ]);
        // dd($request);
        $credentials = $request->only('email', 'password');
        // dd($credentials);
        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('index')->with(['alert-type' => 'success', 'message' => 'Login Successfully.']);
        } else {
            return redirect()->back()->withErrors(["credentials" => "Credentials doesn't match our records"]);
        }
    }

    public function logout()
    {
        if (Auth::guard('web')) {
            Auth::guard('web')->logout();
        }
        return redirect()->route('frontend.login')->with(['alert-type' => 'success', 'message' => 'Log Out Successfully.']);;
    }
}
