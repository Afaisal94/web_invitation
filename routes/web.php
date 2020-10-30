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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/invitation/{slug}', [App\Http\Controllers\HomeController::class, 'invitation'])->name('invitation');
Route::post('/home/guestbook', [App\Http\Controllers\HomeController::class, 'guestbook'])->name('home.guestbook');

Route::get('/galleries/{id}', [App\Http\Controllers\GalleryController::class, 'index'])->name('galleries');
Route::get('/galleries/create/{id}', [App\Http\Controllers\GalleryController::class, 'create'])->name('galleries.create');
Route::post('/galleries/store', [App\Http\Controllers\GalleryController::class, 'store'])->name('galleries.store');
Route::delete('/galleries/destroy/{id}', [App\Http\Controllers\GalleryController::class, 'destroy'])->name('galleries.destroy');
//Route::get('/galleries/edit/{id}', [App\Http\Controllers\GalleryController::class, 'edit'])->name('galleries.edit');
//Route::post('/galleries/update/{id}', [App\Http\Controllers\GalleryController::class, 'update'])->name('galleries.update');

Route::get('/themes', [App\Http\Controllers\ThemeController::class, 'index'])->name('themes');
Route::get('/themes/create', [App\Http\Controllers\ThemeController::class, 'create'])->name('themes.create');
Route::post('/themes/store', [App\Http\Controllers\ThemeController::class, 'store'])->name('themes.store');
Route::get('/themes/show/{id}', [App\Http\Controllers\ThemeController::class, 'show'])->name('themes.show');
Route::get('/themes/edit/{id}', [App\Http\Controllers\ThemeController::class, 'edit'])->name('themes.edit');
Route::post('/themes/update/{id}', [App\Http\Controllers\ThemeController::class, 'update'])->name('themes.update');
Route::delete('/themes/destroy/{id}', [App\Http\Controllers\ThemeController::class, 'destroy'])->name('themes.destroy');

Route::get('/invitations', [App\Http\Controllers\InvitationController::class, 'index'])->name('invitations');
Route::get('/invitations/create', [App\Http\Controllers\InvitationController::class, 'create'])->name('invitations.create');
Route::post('/invitations/store', [App\Http\Controllers\InvitationController::class, 'store'])->name('invitations.store');
Route::get('/invitations/show/{slug}', [App\Http\Controllers\InvitationController::class, 'show'])->name('invitations.show');
Route::get('/invitations/edit/{id}', [App\Http\Controllers\InvitationController::class, 'edit'])->name('invitations.edit');
Route::post('/invitations/update/{id}', [App\Http\Controllers\InvitationController::class, 'update'])->name('invitations.update');
Route::delete('/invitations/destroy/{id}', [App\Http\Controllers\InvitationController::class, 'destroy'])->name('invitations.destroy');