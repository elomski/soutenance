<?php

use App\Http\Controllers\DirecteurController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\ResponsableRhController;
use App\Http\Controllers\StatutPermissionController;
use App\Http\Controllers\TypeController;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Route;



//Authentification personnel
Route::get('/', [PersonnelController::class, 'login'])->name('login');
Route::post('/login', [PersonnelController::class, 'Dologin'])->name('login.process');
Route::get('/registere', [PersonnelController::class, 'registerview'])->name('registerview');
Route::post('/register', [PersonnelController::class, 'register'])->name('register.process');


//Authentification Responsable
Route::get('/responsableR', [ResponsableRhController::class, 'responsablelogin'])->name('responsable');
Route::post('/responsableR', [ResponsableRhController::class, 'DoRespoLogin'])->name('responsable.process');
Route::post('/responsableRegister', [ResponsableRhController::class, 'ResponsableRegistrer'])->name('responsable.register.process');
Route::get('/responsableRegister' , [ResponsableRhController::class, 'responsableRegisterview'])->name('responsable.register.view');
Route::get('/responsableList', [ResponsableRhController::class, 'index'])->name('responsable.list');
Route::get('/responsableRh', [ResponsableRhController::class, 'responsableDash'])->name('responsable.dashboard');
Route::get('/responsableR/{responsable}/edit', [ResponsableRhController::class, 'responsableEdit'])->name('responsable.update');
Route::post('/responsableR/{responsable}/update', [ResponsableRhController::class, 'responsableUpdate'])->name('responsable.update.process');


//Authentification du directeur
Route::get('/directeu', [DirecteurController::class, 'directeurlogin'])->name('directeur.login');
Route::post('/directeu', [DirecteurController::class, 'DirecLogin'])->name('directeur.login.process');
Route::get('/directeur', [DirecteurController::class, 'directeurDash'])->name('directeur.dashboard');

Route::get('/register', function(){
    return view('authentication.register');
});

Route::get('/regle et politique', [DirecteurController::class, 'regle'])->name('regle');

Route::get('/list', [PersonnelController::class, 'index'])->name('personnel.index');

Route::middleware('auth')->group(function(){
});
Route::get('/dashboard', [PersonnelController::class, 'dashboard'])->name('dashboard');



//CRUD pour type de permission
Route::resource('/type', TypeController::class);

//CRUD pour la permission
Route::resource('/permission', PermissionController::class);

Route::patch('permission/{permission}/update1', [PermissionController::class, 'update1'])->name('permission.update1');

Route::patch('permission/{permission}/update3', [PermissionController::class, 'update2'])->name('permission.update2');

//CRUD pour statut de la permission
//Route::resource('/statut', StatutPermisionController::class);

Route::get('/events', [EventController::class, 'getEvents']);

Route::get('listPermissions', [PersonnelController::class, 'listDesPermission'])->name('listDesPermission');

Route::get('/misAjour/{personnel}/edit', [PersonnelController::class,'edit' ])->name('editPersonnel.process');
Route::put('/misAjour/{personnel}/update', [PersonnelController::class,'updatePersonnel' ])->name('updatePersonnel.process');

Route::get('/permissionstatut', [ResponsableRhController::class, 'permissionstatut'])->name('permission.statut');
Route::get('/listPersonnels', [ResponsableRhController::class, 'ListePersonnels'])->name('list.personnels');


Route::get('/permission/{id}/voir',[ResponsableRhController::class, 'VoirPermission'])->name('voirPermission');


Route::post('/events', [EventController::class, 'store'])->name('events.store');
