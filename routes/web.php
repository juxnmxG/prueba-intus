<?php

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

use App\Http\Controllers\PreguntaController;

Route::get('/', [PreguntaController::class, 'index']);

Auth::routes();

Route::resource('preguntas', 'PreguntaController')->middleware('auth');
Route::resource('respuestas', 'RespuestaController')->middleware('auth');
Route::resource('votos', 'VotosController')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home');
