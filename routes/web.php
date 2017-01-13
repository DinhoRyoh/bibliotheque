<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/livre', 'LivreController@index');
Route::post('/livre/new', 'LivreController@insertOne');
Route::post('/livre/update', 'LivreController@updateOne');

Route::get('/ajoutlivre', 'LivreController@create');
Route::get('livre/{id}/delete', 'LivreController@deleteOne');
Route::get('livre/{id}/update', 'LivreController@livreUpdate');
