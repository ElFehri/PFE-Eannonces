<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Test;
use App\Http\Livewire\UserDashboard;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;

// ...

Auth::routes();



Route::group(['prefix'=> 'dashboard'], function(){
    Route::get('/Admin', function(){
        return view('dashboard.Admin');})->name('dashboard.Admin');
    
    Route::get('/Responsable', function(){
        return view('livewire.test');})->name('dashboard.Responsable');
    
    Route::get('/Member', function(){
        return view('dashboard.Member');})->name('dashboard.Member');

    Route::get('create/annonce', function(){
        return view('annonces.create');
    })->name('creerAnnonce');

})->middleware(['auth', 'admin', 'responsable']);







Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function(){
    return view('test');
});
Route::get('/home' , [HomeController::class, 'index']);
// Users type

   