<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    

    use RegistersUsers;

    
    
    protected $redirectTo = '/';
    public function __construct()
    {
        $this->middleware('guest');
    }

    
    protected function validator(array $data)
    {
        
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'CIN' => ['required', 'string', 'max:10', 'unique:users'],
            'role' => ['required', 'string']
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'CIN' => $data['CIN'],
            'role'=> $data['role'],
            'authorized' => false,
        ]);
        
    }
}
