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
Route::get('/movies/top-rated/{page?}', 'MoviesController@topRated');
Route::get('/movies/{id}', 'MoviesController@show')->name('movies.show');

Route::post('/movies/{id}/favorite', 'FavoritesController@addFavoriteMovie')->name('favorite.movie.add');
Route::post('/tv/{id}/favorite', 'FavoritesController@addFavoriteTV')->name('favorite.tv.add');

Route::delete('movies/{id}/unfavorite', 'FavoritesController@deleteFavoriteMovie')->name('favorite.movie.delete');
Route::delete('tv/{id}/unfavorite', 'FavoritesController@deleteFavoriteTV')->name('favorite.tv.delete');

Route::get('/tv/top-rated', 'TvController@topRated')->name('tv.top');
Route::get('/tv/top-rated/{page?}', 'TvController@topRated');
Route::get('/tv/{id}', 'TvController@show')->name('tv.show');

Route::get('/people/popular', 'PeopleController@popular')->name('people.popular');
Route::get('/people/popular/{page?}', 'PeopleController@popular');
Route::get('/people/{id}', 'PeopleController@show')->name('people.show');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();



