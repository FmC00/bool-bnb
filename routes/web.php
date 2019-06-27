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
Route::delete('/destroyApartment/{id}', 'HomeController@destroy')->name('destroyApartment');
Route::get('/sponsorApartment', 'HomeController@sponsorApartment')->name('sponsorApartment');
Route::get('/statsApartment', 'HomeController@statsApartment')->name('statsApartment');
Route::get('/messagesApartment', 'HomeController@messagesApartment')->name('messagesApartment');
Route::get('/detailApartment', 'HomeController@detailApartment')->name('detailApartment');
