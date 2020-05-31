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

Auth::routes(['verify' => true]);

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function() {
	
	Route::view('dashboard', 'home');

	Route::get('symbols', 'SymbolController@api');

	Route::post('positions', 'PositionController@store');

	Route::get('my-portfolio', 'UserController@portfolio');

});


// Route::get('/home', 'HomeController@index')->name('home');
