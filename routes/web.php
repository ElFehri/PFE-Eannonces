<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\DashPublications;
use App\Http\Controllers\HomeController;



//entrain de test
Auth::routes();

Route::group(['middleware'=>'admin'], function(){
    Route::get('/dashboard/Admin', function(){
        return view('dashboard.Admin');
    })->name('dashboard.Admin');
});


Route::group(['middleware'=>'responsable'], function(){
    Route::get('/dashboard/Responsable', function(){
        return view('dashboard.Responsable');
    })->name('dashboard.Responsable');
});

Route::group(['middleware'=>'auth'], function(){
    Route::get('/dashboard/Member', function(){
        return view('dashboard.Member');
    })->name('dashboard.Member');
}); 







Route::get('/', function () {
    return view('welcome');
});
Route::get('/home' , [HomeController::class, 'index']);
// Users type

   