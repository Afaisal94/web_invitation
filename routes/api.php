<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/themes', [App\Http\Controllers\Api\ThemeController::class, 'index']);
Route::get('/theme/{id}', [App\Http\Controllers\Api\ThemeController::class, 'show']);

Route::get('/invitations', [App\Http\Controllers\Api\InvitationController::class, 'index']);
Route::get('/invitation/{id}', [App\Http\Controllers\Api\InvitationController::class, 'show']);
