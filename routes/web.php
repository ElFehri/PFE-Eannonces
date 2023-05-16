<?php

use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\DashPublications;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;


// role

Auth::routes();



Route::group(['prefix'=> 'home', 'middleware'=>'auth'], function(){
   
    //route apres l'auth
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

    Route::resource('/annonces', AnnonceController::class);
    
    Route::resource('/information', InformationController::class);

    Route::get('/mes/publications', [UsersController::class, 'mesPublications'])->name('mesPublications');
   

    //users-list, profile, user-profile, screen
    Route::get('/test', [DashPublications::class, 'ecran'])->name('ecran');

    Route::get('/users/list', [UsersController::class, 'usersList'])->name('usersList');

    Route::get('/user/profile', [UsersController::class, 'userProfile'])->name('userProfile');

    Route::get('/my/profile', [UsersController::class, 'profile'])->name('profile');

});



Route::get('/', function () {
    return view('welcome');
});


   