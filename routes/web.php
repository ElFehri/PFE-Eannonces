<?php

use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\DashPublications;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;

// role

Auth::routes();



Route::group(['prefix'=> 'home', 'middleware'=>'auth'], function(){
   
    //route apres l'auth
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

    
    Route::get('/test', [DashPublications::class, 'ecran'])->name('ecran');

    Route::resource('/annonces', AnnonceController::class);
    
    Route::resource('/information', AnnonceController::class);


   

});



Route::get('/', function () {
    return view('welcome');
});


   