<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BackController, HomeController, DashboardController, 
    EncadreurController, DoctorantController, ActivityController, ConseilController, MessagesController,
    UserController, 
};
use App\Http\Controllers\Admin\{
    AdminController, PostController, OfferController
};
use App\Models\Doctorant;
use App\Models\Encadreur;


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
Route::get('/posts', [HomeController::class, 'posts'])->name('posts');
Route::get('/posts/{id}', [HomeController::class, 'showPost'])->name('post.show');
Route::get('/theses', [HomeController::class, 'theses'])->name('theses');
Route::get('/theses/{id}', [HomeController::class, 'showTheses'])->name('theses.show');
Route::post('/newsletter', [HomeController::class, 'newsletter'])->name('newsletter');

Route::middleware('auth')->group(function() {

    Route::put('/email/update/{id}', [UserController::class, 'update_email'])->name('update_email');
    Route::put('/password/update/{id}', [UserController::class, 'update_password'])->name('update_password');

    // Routes pour l'administrateur de l'école doctorale
    Route::prefix('admin')->group(function() {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/doctorants', [AdminController::class, 'doctorants'])->name('admin.doctorant');
        Route::get('/encadreurs', [AdminController::class, 'encadreurs'])->name('admin.encadreur');
        Route::get('/profil', [AdminController::class, 'profilAdmin'])->name('admin.profil');
        Route::get('/doctorant/{id}', [AdminController::class, 'profilDoctorant'])->name('admin.doctorant.profil');
        Route::get('/doctorant/{id}/edit', [AdminController::class, 'editDoctorant'])->name('admin.doctorant.edit');
        Route::put('/doctorant/{id}', [AdminController::class, 'updateDoctorant'])->name('admin.doctorant.update');
        Route::get('/encadreur/{id}', [AdminController::class, 'profilEncadreur'])->name('admin.encadreur.profil');
        Route::get('/encadreur/{id}/edit', [AdminController::class, 'editEncadreur'])->name('admin.encadreur.edit');
        Route::put('/encadreur/{id}', [AdminController::class, 'updateEncadreur'])->name('admin.encadreur.update');

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
        Route::get('/create-these/{id}', [AdminController::class, 'createThese'])->name('admin.create.these');
        Route::post('/store-these/{id}}', [AdminController::class, 'storeThese'])->name('admin.store.these');
        Route::get('/theses', [AdminController::class, 'indexTheses'])->name('admin.theses');
        Route::get('theses/{id}', [AdminController::class, 'showThese'])->name('admin.theses.show');
        Route::get('/theses/{id}/edit', [AdminController::class, 'editThese'])->name('admin.theses.edit');
        Route::put('/theses/{id}', [AdminController::class, 'updateThese'])->name('admin.theses.update');
        Route::delete('/theses/{id}', [AdminController::class, 'destroyThese'])->name('admin.theses.delete');
        Route::get('theses/parcours/{id}', [AdminController::class, 'parcours'])->name('admin.theses.parcours');

        //Gestion des posts
        Route::resource("posts", PostController::class);
        //Gestion des offres
        Route::resource("offers", OfferController::class);
    });

    // Routes pour l'espace encadreur
    Route::prefix('encadreur')->group(function() {
        Route::get('/index', [EncadreurController::class, 'home'])->name('encadreur.index');
        Route::get('/profil', [EncadreurController::class, 'profilEncadreur'])->name('encadreur.profil');
        Route::get('/doctorant', [EncadreurController::class, 'indexDoctorant'])->name('encadreur.doctorant.index');
        Route::get('/doctorant/{id}', [EncadreurController::class, 'showDoctorant'])->name('encadreur.doctorant.show');
        Route::get('/publish', [EncadreurController::class, 'publish'])->name('encadreur.publish');
        Route::get('/activity/{id}', [EncadreurController::class, 'showActivity'])->name('encadreur.show_activity');
        Route::post('/validate/activity/{id}/{doctorant}', [ActivityController::class, 'validate_activity'])->name('encadreur.validate_activity');
        Route::post('/reject/activity/{id}', [ActivityController::class, 'reject_activity'])->name('encadreur.reject_activity');
        Route::get('/messages', [MessagesController::class, 'index'])->name('encadreur.messages');
        Route::get('/messages/{user}', [MessagesController::class, 'show'])->name('encadreur.messages.show');
        Route::post('/messages/{user}', [MessagesController::class, 'store']);

    });

    // Routes pour l'espace doctorant 
    Route::prefix('doctorant')->group(function() {
        Route::get('/index', [DoctorantController::class, 'home'])->name('doctorant.index');
        Route::get('/profil', [DoctorantController::class, 'profilDoctorant'])->name('doctorant.profil');
        Route::get('/formation', [DoctorantController::class, 'formation'])->name('doctorant.formation');
        Route::get('/formation/{id}', [DoctorantController::class, 'showFormation'])->name('doctorant.formation.show');
        Route::get('activities', [ActivityController::class, 'index'])->name('doctorant.activity.index');
        Route::get('historiques', [ActivityController::class, 'historiques'])->name('doctorant.his');
        Route::get('historiques/{id}', [ActivityController::class, 'histo'])->name('doctorant.histo');
        Route::get('activity/{id}', [ActivityController::class, 'show'])->name('doctorant.activity.show');
        Route::post('activity/store', [ActivityController::class, 'store'])->name('doctorant.activity.store');
        Route::get('encadreur/{id}', [DoctorantController::class, 'showEncadreur'])->name('doctorant.encadreur');

        Route::get('/activity/submit/{id}', [ActivityController::class, 'activity_submit'])->name('doctorant.activity_submit');
        Route::post('/activity/submitted/{id}', [ActivityController::class, 'submit'])->name('doctorant.submitted_activity');
        Route::get('/messages', [MessagesController::class, 'index'])->name('doctorant.messages');
        Route::get('/messages/{id}', [MessagesController::class, 'show'])->name('doctorant.messages.show');
    });

    // Routes pour l'espace conseil scientifique 
    Route::prefix('conseil')->group(function() {
        Route::get('/index', [ConseilController::class, 'home'])->name('conseil.index');
        Route::get('/ecoles', [ConseilController::class, 'ecoles'])->name('conseil.ecoles');
        Route::get('/ecoles/{id}', [ConseilController::class, 'showEcoles'])->name('ecoles.show');
        Route::get('/doctorants', [ConseilController::class, 'doctorants'])->name('conseil.doctorant');
        Route::get('/encadreurs', [ConseilController::class, 'encadreurs'])->name('conseil.encadreur');
        Route::get('/profil', [ConseilController::class, 'profil'])->name('conseil.profil');
    });


});

Auth::routes();



















// Route::get('admin/dashboard', [DashboardController::class, 'adminDashboard'])->name("admin.index");
// Route::get('encadreur/dashboard', [DashboardController::class, 'encadreurDashboard'])->name("encadreur.index");
// Route::get('doctorant/dashboard', [DashboardController::class, 'doctorantDashboard'])->name("doctorant.index");
