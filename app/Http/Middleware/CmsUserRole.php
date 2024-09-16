<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CmsUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowed_roles = array_slice(func_get_args(), 2);
        // dd($allowed_roles);
        $user = auth()->user();
        if ($user && in_array($user->role, $allowed_roles)) {
            return $next($request);
        }
        return redirect()->back()->with(toast("You don't have required permission to access.", 'info'));
    }
}
