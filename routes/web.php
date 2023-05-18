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
   
    //route apres l'auth par default
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

    //les routes des annonces et des informaions
    Route::resource('/annonces', AnnonceController::class);
    
    Route::resource('/information', InformationController::class);

    //routes entre utilisateur et  publications
    Route::get('/mes/annonces', [UsersController::class, 'mesAnnonces'])->name('mesAnnonces');

    Route::get('/mes/informations', [UsersController::class, 'mesInformations'])->name('mesInformations');

    Route::get('/all/annonces', [HomeController::class,'allAnnonces'])->name('allAnnonces');

    Route::get('/all/informations', [HomeController::class,'allInformations'])->name('allInformations');

    

    //users-list, profile, user-profile, screen
    Route::get('/screen', [DashPublications::class, 'screen'])->name('ecran');

    Route::get('/users/list', [UsersController::class, 'usersList'])->name('usersList');

    Route::get('/user/profile', [UsersController::class, 'userProfile'])->name('userProfile');

    Route::get('/my/profile', [UsersController::class, 'profile'])->name('profile');

});



Route::get('/', function () {
    return view('welcome');
});


   