<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rota para obter a lista de desenvolvedores
Route::get('/developers', 'App\Http\Controllers\DeveloperController@index');

// Rota para criar um novo desenvolvedor
Route::post('/developers', 'App\Http\Controllers\DeveloperController@store');

// Rota para atualizar um desenvolvedor existente
Route::put('/developers/{developer}', 'App\Http\Controllers\DeveloperController@update');

// Rota para excluir um desenvolvedor existente
Route::delete('/developers/{developer}', 'App\Http\Controllers\DeveloperController@destroy');

// Rota para obter a lista de níveis
Route::get('/levels', 'App\Http\Controllers\LevelController@index');

// Rota para criar um novo nível
Route::post('/levels', 'App\Http\Controllers\LevelController@store');

// Rota para atualizar um nível existente
Route::put('/levels/{level}', 'App\Http\Controllers\LevelController@update');

// Rota para excluir um nível existente
Route::delete('/levels/{level}', 'App\Http\Controllers\LevelController@destroy');

// Rota para obter a lista de habilidades
Route::get('/skills', 'App\Http\Controllers\SkillController@index');

// Rota para criar uma nova habilidade
Route::post('/skills', 'App\Http\Controllers\SkillController@store');

// Rota para atualizar uma habilidade existente
Route::put('/skills/{skill}', 'App\Http\Controllers\SkillController@update');

// Rota para excluir uma habilidade existente
Route::delete('/skills/{skill}', 'App\Http\Controllers\SkillController@destroy');

// Rota para obter a lista de projetos
Route::get('/projects', 'App\Http\Controllers\ProjectController@index');

// Rota para criar um novo projeto
Route::post('/projects', 'App\Http\Controllers\ProjectController@store');

// Rota para atualizar um projeto existente
Route::put('/projects/{project}', 'App\Http\Controllers\ProjectController@update');

// Rota para excluir um projeto existente
Route::delete('/projects/{project}', 'App\Http\Controllers\ProjectController@destroy');

// Rota para obter a lista de desenvolvedores que estão em um projeto
Route::get('/projects/{project}/developers', 'App\Http\Controllers\ProjectController@getDevelopers');

// Rota para adicionar um desenvolvedor a um projeto
Route::post('/projects/{project}/developers/{developer}', 'App\Http\Controllers\ProjectController@addDeveloper');

// Rota para remover um desenvolvedor de um projeto
Route::delete('/projects/{project}/developers/{developer}', 'App\Http\Controllers\ProjectController@removeDeveloper');

// Rota para obter a lista de habilidades que estão em um desenvolvedor
Route::get('/developers/{developer}/skills', 'App\Http\Controllers\DeveloperController@getSkills');

// Rota para adicionar uma habilidade a um desenvolvedor
Route::post('/developers/{developer}/skills/{skill}', 'App\Http\Controllers\DeveloperController@addSkill');

// Rota para remover uma habilidade de um desenvolvedor
Route::delete('/developers/{developer}/skills/{skill}', 'App\Http\Controllers\DeveloperController@removeSkill');
