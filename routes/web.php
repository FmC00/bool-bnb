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

Route::get('/', 'AllController@showHome')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/myDashboard', 'HomeController@myDashboard')->name('myDashboard');

Route::get('/addApartment', 'HomeController@addApartment')->name('addApartment');
Route::post('/addApartment', 'HomeController@store')->name('storeApartment');
Route::put('/updateApartment', 'HomeController@update')->name('updateApartment');
Route::delete('/destroyApartment/{id}', 'HomeController@destroy')->name('destroyApartment');

Route::get('/sponsorApartment', 'HomeController@sponsorApartment')->name('sponsorApartment');
Route::get('/statsApartment', 'HomeController@statsApartment')->name('statsApartment');
Route::get('/messagesApartment', 'HomeController@messagesApartment')->name('messagesApartment');

Route::group(['middleware' => 'auth'], function() {
  Route::get('/plans', 'PlanController@index')->name('plans.index');
  Route::get('/plan/{plan}', 'PlanController@show')->name('plans.show');
  Route::get('/braintree/token', 'BraintreeTokenController@index')->name('token');
  Route::post('/subscription', 'SubscriptionController@create')->name('subscription.create');
});

Route::post('/message/new', 'AllController@storeMessage')->name('storeMessage');

Route::get('/searchApartment','AllController@search')->name('search');
Route::get('/detailApartment', 'HomeController@detailApartment')->name('detailApartment');

Route::get('/detailsApartment/{id}', 'AllController@detailsApartment')->name('detailsApartment');
