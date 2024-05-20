<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ElencoController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminRole;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    //Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    //Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    //Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/files', [FileController::class, 'store']);

Route::get('/search', [ActorController::class, 'search'])->name('actors.search');
Route::get('/', [ActorController::class, 'index'])->name('index');
Route::get('actor/{id}', [ActorController::class, 'show'])->name('actor.show');
Route::get('/actor/name/{actor_id}', 'ActorController@getActorName');

Route::middleware([AdminRole::class])->group(function () {
    Route::get('/personajes/create', [AdminController::class, 'createPersonaje'])->name('admin.personajes.create');
    Route::post('/personajes/add', [AdminController::class, 'storePersonaje'])->name('admin.personajes.store');
    Route::get('/personajes', [AdminController::class, 'indexPersonaje'])->name('admin.personajes.index');
    Route::delete('/personajes/{id}', [AdminController::class, 'deletePersonaje'])->name('admin.personajes.delete');

    Route::get('/actores/create', [AdminController::class, 'createActor'])->name('admin.actores.create');
    Route::post('/actores/add', [AdminController::class, 'storeActor'])->name('admin.actores.store');
    Route::get('/actores', [AdminController::class, 'indexActor'])->name('admin.actores.index');
    Route::delete('/actores/{id}', [AdminController::class, 'deleteActor'])->name('admin.actores.delete');

});
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile.index');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('elenco/create', [ElencoController::class, 'create'])->name('elenco.create');;
    Route::get('elenco/{id}', [ElencoController::class, 'show'])->name('elenco.show');;
    Route::get('elenco/', [ElencoController::class, 'index'])->name('elenco.index');

    Route::post('elenco/store', [ElencoController::class, 'guardarElenco'])->name('guardar_elenco');
    // Route::patch('/elencos/{id}/like', [ElencoController::class, 'toggleLike'])->name('elencos.like');
    Route::post('/elenco/{id}/like', [ElencoController::class, 'like'])->name('elenco.like');

    Route::post('/comentarios', [ComentarioController::class, 'store'])->name('comentario.store');
    Route::delete('/comentarios/{id}', [ComentarioController::class, 'destroy'])->name('comentario.destroy');
    Route::get('/files/download/{filename}', [FileController::class, 'download'])->name('files.download'); // Agrega la ruta para el método download
});

require __DIR__.'/auth.php';
