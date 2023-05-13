<?php

namespace App\Http\Controllers;

use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    

    
    public function index()
    {
        try {
            if (Auth::check()) {
                return redirect()->route('dashboard.' . Auth::user()->role);
            }
    
            return redirect()->route('dashboard.Member');
            
        } catch (Error $e) {
            abort(404, $e);
        }
    }

}