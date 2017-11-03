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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'NinjaController@frontpage');

Route::get('/seznam', 'NinjaController@seznam');

Route::get('/seznam/{id}', 'NinjaController@seznam');

Route::get('/objavidelovnomesto', 'NinjaController@ustvari');

Route::post('/objavidelovnomesto', 'UpdateController@ustvari');

Route::get('/uredi', 'NinjaController@uredi');

Route::post('/uredi', 'UpdateController@uredi');

