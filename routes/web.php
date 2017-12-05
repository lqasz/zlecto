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

Route::get('/', function () {
    return view('main');
});


Route::get('zlecenia/stworz', 'OrderController@create');
Route::get('zlecenia/{id}', 'OrderController@show');
Route::get('zlecenia/{id}/edytuj', 'OrderController@edit');
Route::post('zlecenia', 'OrderController@store');
Route::put('zlecenia/{id}', 'OrderController@update');
Route::delete('zlecenia/{id}', 'OrderController@destroy');

Route::get('/rejestracja', 'Auth\RegisterController@index');

Route::prefix('v1')->group(function() {
    Route::get('/glowna', 'HomeController@index');
    // Route::get('/zapomniane', 'Auth\ForgotPasswordController@test');
    Route::post('/rejestracja', 'Auth\RegisterController@register');
});