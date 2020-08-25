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

Route::get('/', 'MainController@index')->name('main');

Route::get('/movies/top-rated', 'MoviesController@topRated')->name('movies.top');
Route::get('/movies/top-rated/page/{page?}', 'MoviesController@topRated');
Route::get('/movies/{id}', 'MoviesController@show')->name('movies.show');

Route::get('/tv/{id}', 'TvController@show')->name('tv.show');

Route::get('/people/{id}', 'PeopleController@show')->name('people.show');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();



