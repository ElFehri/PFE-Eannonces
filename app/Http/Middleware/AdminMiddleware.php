<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
    

        if (Auth::user()) {
                $role = Auth::user()->role;
                if ($role == "Admin") {
                    return redirect()->route("dashboard.Admin");
                } 
        } else {
            return route('login');
        }
        
        
    }
}
