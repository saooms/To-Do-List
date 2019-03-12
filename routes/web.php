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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', 'PagesController@index');

// Route::get('/hi', function() {
//     return view('pages.index');
// });

Route::get('', 'PagesController@index');
Route::Resource('/cards', 'CardsController');
Route::Resource('/lists', 'ListsController');

// Route::Resource('/lists', 'MainController');

// Route::get('/add', 'PagesController@create_card');