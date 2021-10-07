<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/albums/index', [App\Http\Controllers\AlbumController::class, 'index'])->name('album.index');
    Route::get('/albums/index/artist_id/{artist_id}', [App\Http\Controllers\AlbumController::class, 'index'])->name('album.index.artist');
    Route::get('/album/create', [App\Http\Controllers\AlbumController::class, 'create'])->name('album.create');
    Route::get('/album/create/artist_id/{artist_id}', [App\Http\Controllers\AlbumController::class, 'create'])->name('album.create.artist');
    Route::post('/album/store', [App\Http\Controllers\AlbumController::class, 'store'])->name('album.store');
    Route::get('/album/id/{id}', [App\Http\Controllers\AlbumController::class, 'show'])->name('album.show');
    Route::get('/album/delete/id/{id}', [App\Http\Controllers\AlbumController::class, 'delete'])->name('album.delete');
    Route::get('/album/edit/{id}', [App\Http\Controllers\AlbumController::class, 'edit'])->name('album.edit');

});

