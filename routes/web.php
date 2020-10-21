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

Route::get('/themes', [App\Http\Controllers\ThemeController::class, 'index'])->name('themes');
Route::get('/themes/create', [App\Http\Controllers\ThemeController::class, 'create'])->name('themes.create');

Route::get('/invitations', [App\Http\Controllers\InvitationController::class, 'index'])->name('invitations');
Route::get('/invitations/create', [App\Http\Controllers\InvitationController::class, 'create'])->name('invitations.create');
