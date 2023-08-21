<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BackController, HomeController, DashboardController, 
    EncadreurController, DoctorantController
};
use App\Http\Controllers\Admin\{
    AdminController
};
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
| be assigned to the "web" middleware group. Make something great !
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::middleware('auth')->group(function() {

    // Routes pour l'administrateur de l'école doctorale
    Route::prefix('admin')->group(function() {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/doctorants', [AdminController::class, 'doctorants'])->name('admin.doctorant');
        Route::get('/encadreurs', [AdminController::class, 'encadreurs'])->name('admin.encadreur');
        Route::get('/profil', [AdminController::class, 'profilAdmin'])->name('admin.profil');
        Route::get('/doctorant/{doctorantId}', [AdminController::class, 'profilDoctorant'])->name('admin.doctorant.profil');
        Route::get('/encadreur/{encadreurId}', [AdminController::class, 'profilEncadreur'])->name('admin.encadreur.profil');
        Route::get('/create-doctorant', [AdminController::class, 'createDoctorant'])->name('admin.create.doctorant');
        Route::post('/store-doctorant', [AdminController::class, 'storeDoctorant'])->name('admin.store.doctorant');
        Route::get('/create-encadreur', [AdminController::class, 'createEncadreur'])->name('admin.create.encadreur');
        Route::post('/store-encadreur', [AdminController::class, 'storeEncadreur'])->name('admin.store.encadreur');
        Route::get('users', [AdminController::class, 'manageUsers'])->name('admin.users');

        // Gestion des formations
        Route::get('/create-formation', [AdminController::class, 'createFormation'])->name('admin.create.formation');
        Route::post('/store-formation', [AdminController::class, 'storeFormation'])->name('admin.store.formation');
        Route::delete('/formations/{id_formation}', [AdminController::class, 'deleteFormation'])->name('admin.delete.formation');
        Route::get('formations', [AdminController::class, 'formations'])->name('admin.formations');
        Route::get('formations/{id}', [AdminController::class, 'showFormation'])->name('admin.formation');

        // Gestion des thèses
        Route::get('/theses', [AdminController::class, 'indexTheses'])->name('admin.theses');
        Route::get('theses/{id}', [AdminController::class, 'showThese'])->name('admin.theses.show');
        Route::post('/theses', [AdminController::class, 'storeThese'])->name('admin.theses.store');
        Route::put('/theses/{id}', [AdminController::class, 'updateThese'])->name('admin.theses.update');
        Route::delete('/theses/{id}', [AdminController::class, 'destroyThese'])->name('admin.theses.delete');
    });

    // Routes pour l'espace encadreur
    Route::prefix('encadreur')->group(function() {
        Route::get('/index', [EncadreurController::class, 'home'])->name('encadreur.index');
        Route::get('/profil', [EncadreurController::class, 'profilEncadreur'])->name('encadreur.profil');
        Route::get('/doctorant', [EncadreurController::class, 'indexDoctorant'])->name('encadreur.doctorant.index');
        Route::get('/doctorant/{id}', [EncadreurController::class, 'showDoctorant'])->name('encadreur.doctorant.show');
        Route::get('/publications', [EncadreurController::class, 'publications'])->name('encadreur.publications');
        Route::get('/publish', [EncadreurController::class, 'publish'])->name('encadreur.publish');
        Route::get('/publish/{id}', [EncadreurController::class, 'publishDoctorant'])->name('encadreur.doctorant.publish');
    });

    // Routes pour l'espace doctorant 
    Route::prefix('doctorant')->group(function() {
        Route::get('/index', [DoctorantController::class, 'home'])->name('doctorant.index');
        Route::get('/activity', [DoctorantController::class, 'activity'])->name('doctorant.activity');
        Route::get('/profil', [DoctorantController::class, 'profilDoctorant'])->name('doctorant.profil');
        Route::get('/formation', [DoctorantController::class, 'formation'])->name('doctorant.formation');
    });


});

Auth::routes();



















// Route::get('admin/dashboard', [DashboardController::class, 'adminDashboard'])->name("admin.index");
// Route::get('encadreur/dashboard', [DashboardController::class, 'encadreurDashboard'])->name("encadreur.index");
// Route::get('doctorant/dashboard', [DashboardController::class, 'doctorantDashboard'])->name("doctorant.index");