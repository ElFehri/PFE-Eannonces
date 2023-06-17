<?php

use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\InformationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;


// role

Auth::routes();



Route::group(['prefix'=> 'home', 'middleware'=>['auth','web']], function(){
   
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

    //Les notifications de responsable
    Route::get('/new/announcements', [ResponsableController::class,'newAnnonces'])->name('newAnnonces');
    Route::get('/new/information', [ResponsableController::class,'newInformations'])->name('newInformations');
    Route::get('/publication/valide/{id}', [PublicationController::class, 'validatePublication'])->name('publication.valide');
    Route::get('/publication/reject/{id}', [PublicationController::class, 'rejectPublication'])->name('publication.reject');
    Route::get('/publication/masked/{id}', [PublicationController::class, 'mask'])->name('publication.mask');
    Route::get('/publication/unmasked/{id}', [PublicationController::class, 'unmask'])->name('publication.unmask');


    Route::get('/new/users', [ResponsableController::class,'newUsers'])->name('newUsers');
    Route::get('/responsable/validate/{user}', [ResponsableController::class, 'validateUser'])->name('responsable.validate');
    Route::delete('/responsable/reject/{user}', [ResponsableController::class, 'rejectUser'])->name('responsable.reject');
    Route::post('/change/user/role/{id}', [ResponsableController::class, 'changeUserRole'])->name('changeUserRole');

    

    //users-list, profile, user-profile, screen

    Route::get('/users/list', [UsersController::class, 'usersList'])->name('usersList');

    Route::get('/user/profile/{id}', [UsersController::class, 'userProfile'])->name('userProfile');

    Route::get('/my/profile', [UsersController::class, 'profile'])->name('profile');

    Route::post('/my/profile', [UsersController::class, 'editProfile'])->name('editProfile');

    Route::get('/user/authorization/{id}', [UsersController::class, 'userAuthorization'])->name('userAuthorization');


    //gestion des utilisateurs
    Route::get('/add/user', [UsersController::class, 'addUser'])->name('addUser');

    Route::post('/store/user', [UsersController::class, 'storeUser'])->name('storeUser');

    Route::get('/user/announcements', [UsersController::class, 'announcesStatus'])->name('announcesStatus');
    Route::get('/user/information', [UsersController::class, 'informationStatus'])->name('informationStatus');


});

Route::get('/screen', [PublicationController::class, 'screen'])->name('ecran');


Route::get('/', function () {
    return view('welcome');
});


   