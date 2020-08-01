<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
	
	Route::get('cancel', 'SubscriptionController@destroy'); // TESTING ONLY

	Route::get('test', function() {
		return redirect()->route(
			'cashier.payment',
			// [$exception->payment->id, 'redirect' => route('home')]
		);
	});

	Route::view('dashboard', 'home');
	Route::view('portfolio', 'portfolio');
	Route::view('shared-portfolios', 'shared');
	Route::view('account', 'account')->name('account');

	Route::post('positions', 'PositionController@store');
	Route::patch('positions/{position}', 'PositionController@update');
	Route::delete('positions/{position}', 'PositionController@destroy');


	Route::get('plans', 'PlanController@index');
	Route::get('plans/{plan}', 'PlanController@show')->name('plans.show');

	Route::get('subscriptions', 'SubscriptionController@index');
	Route::post('subscriptions', 'SubscriptionController@store')->name('subscriptions.store');
	Route::delete('subscriptions/{subscription}', 'SubscriptionController@destroy');

	Route::get('user', 'UserController@show');
	Route::patch('users/{user}', 'UserController@update');

	Route::get('symbols', 'SymbolController@api');
	Route::get('my-portfolio', 'UserController@portfolio');

});


// Route::get('/home', 'HomeController@index')->name('home');
