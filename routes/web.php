<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EncadreurController;
use App\Http\Controllers\DoctorantController;
use App\Models\Doctorant;
use App\Models\Encadreur;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'index1'])->name('home');

// Routes pour l'administrateur de l'école doctorale
Route::prefix('admin')->group(function() {
    Route::get('/', 'App\Http\Controllers\Admin\AdminController@index')->name('admin.index');
    Route::get('/doctorants', 'App\Http\Controllers\Admin\AdminController@doctorants')->name('admin.doctorant');
    Route::get('/encadreurs', 'App\Http\Controllers\Admin\AdminController@encadreurs')->name('admin.encadreur');
    Route::get('/profil', 'App\Http\Controllers\Admin\AdminController@profilAdmin')->name('admin.profil');
    Route::get('/doctorant/profil/{id}', 'App\Http\Controllers\Admin\AdminController@profilDoctorant')->name('admin.doctorant.profil');
    Route::get('/encadreur/profil/{id}', 'App\Http\Controllers\Admin\AdminController@profilEncadreur')->name('admin.encadreur.profil');
    Route::get('/create-doctorant', 'App\Http\Controllers\Admin\AdminController@createDoctorant')->name('admin.create.doctorant');
    Route::post('/store-doctorant', 'App\Http\Controllers\Admin\AdminController@storeDoctorant')->name('admin.store.doctorant');
    Route::get('/create-encadreur', 'App\Http\Controllers\Admin\AdminController@createEncadreur')->name('admin.create.encadreur');
    Route::post('/store-encadreur', 'App\Http\Controllers\Admin\AdminController@storeEncadreur')->name('admin.store.encadreur');

    Route::get('/doctorant/{doctorantId}', 'App\Http\Controllers\Admin\AdminController@showDoctorantProfile')
    ->name('admin.doctorant.profile');
    Route::get('/encadreur/{encadreurId}', 'App\Http\Controllers\Admin\AdminController@showEncadreurProfile')
    ->name('admin.encadreur.profile');

    // Gestion des formations
    Route::get('formations', 'App\Http\Controllers\Admin\AdminController@showFormations')->name('admin.formations');
    Route::get('formations/{id}', 'App\Http\Controllers\Admin\AdminController@showFormation')->name('admin.formation');

    // Gestion des thèses
    Route::get('/theses', 'App\Http\Controllers\Admin\AdminController@showTheses')->name('admin.theses');
    Route::get('theses/{id}', 'App\Http\Controllers\Admin\AdminController@showThese')->name('admin.these');
});

// Routes pour l'espace encadreur
Route::prefix('encadreur')->group(function() {
    Route::get('/index', [EncadreurController::class, 'home'])->name('encadreur.index');
    Route::get('/profil', [EncadreurController::class, 'profilEncadreur'])->name('encadreur.profil');
    Route::get('/doctorant', [EncadreurController::class, 'indexDoctorant'])->name('encadreur.doctorant.index');
    Route::get('/doctorant/{id}', [EncadreurController::class, 'showDoctorant'])->name('encadreur.doctorant.show');
    Route::get('/publish', [EncadreurController::class, 'publish'])->name('encadreur.publish');
    Route::get('/publish/{id}', [EncadreurController::class, 'publishDoctorant'])->name('encadreur.doctorant.publish');
});

// Routes pour l'espace doctorant 
Route::prefix('doctorant')->group(function() {
    Route::get('/index', [DoctorantController::class, 'home'])->name('doctorant.index');
    Route::get('/activity', [DoctorantController::class, 'activity'])->name('doctorant.activity');
    Route::get('/profil', [DoctorantController::class, 'profilDoctorant'])->name('doctorant.profil');
});
    

// Gestion des formations
Route::get('/admin/formations', 'Admin\AdminController@showFormations')->name('admin.formations');
Route::get('/admin/formations/{id}', 'Admin\AdminController@showFormation')->name('admin.formation');
Auth::routes();

















// Route::get('admin/dashboard', [DashboardController::class, 'adminDashboard'])->name("admin.index");
// Route::get('encadreur/dashboard', [DashboardController::class, 'encadreurDashboard'])->name("encadreur.index");
// Route::get('doctorant/dashboard', [DashboardController::class, 'doctorantDashboard'])->name("doctorant.index");
