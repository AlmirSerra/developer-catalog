<?php

use Illuminate\Support\Facades\Route;

Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');

Route::prefix('api')->group(function () {
    Route::get('/levels', 'App\Http\Controllers\Api\LevelController@index');
    Route::post('/levels', 'App\Http\Controllers\Api\LevelController@store');
    Route::put('/levels/{level}', 'App\Http\Controllers\Api\LevelController@update');
    Route::delete('/levels/{level}', 'App\Http\Controllers\Api\LevelController@destroy');

    Route::get('/developers', 'App\Http\Controllers\Api\DeveloperController@index');
    Route::post('/developers', 'App\Http\Controllers\Api\DeveloperController@store');
    Route::put('/developers/{developer}', 'App\Http\Controllers\Api\DeveloperController@update');
    Route::delete('/developers/{developer}', 'App\Http\Controllers\Api\DeveloperController@destroy');
});
