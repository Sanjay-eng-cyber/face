<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class CmsUserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::if('cmsUserRole', function ($roles) {
            if (Auth::check()) {
                $userRole = auth()->user()->role;
                return in_array($userRole, (array) $roles, true);
            }
            return false;
        });
    }
}
