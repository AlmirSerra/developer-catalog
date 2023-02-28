<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('developer', App\Http\Controllers\DeveloperController::class)->only(['index', 'store', 'update', 'show', 'destroy']);
// Route::resource('developer',App\Http\Controllers\DeveloperController::class);
Route::resource('level', App\Http\Controllers\LevelController::class)->only(['index', 'store', 'update', 'show', 'destroy']);
