<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\CmsUser;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        // return view('auth.reset-password', ['request' => $request]);
        return view('backend.reset-password', ['request' => $request]);
    }

    public function frontendCreate(Request $request): View
    {
        // return view('auth.reset-password', ['request' => $request]);
        return view('frontend.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = $this->broker()->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );
        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        // $redirectRoute = auth()->check() ? 'frontend.login' : 'cms.login';
        $frontendUser = User::where('email', $request->email)->first();

        // Find user in CMS users table
        $adminUser = CmsUser::where('email', $request->email)->first();

        // Determine redirect based on user type
        if ($frontendUser) {
            $redirectRoute = 'frontend.login';
        } elseif ($adminUser) {
            $redirectRoute = 'cms.login';
        } else {
            // Default to CMS login if no user is found (or handle differently)
            $redirectRoute = 'cms.login';
        }
        return $status == $this->broker()::PASSWORD_RESET
            ? redirect()->route($redirectRoute)->with('status', __($status))
            : back()->withInput($request->only('email'))
            ->withErrors(['email' => __($status)]);
    }

    public function broker()
    {
        if (strpos(config('app.web_domain'), request()->getHost()) !== FALSE) {
            return Password::broker('users');
        } else if (strpos(config('app.cms_domain'), request()->getHost()) !== FALSE) {
            return Password::broker('cms_users');
        }
    }
}
