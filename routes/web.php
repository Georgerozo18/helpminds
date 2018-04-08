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
Route::get('/','PagesController@inicio');
Route::get('/ayuda','PagesController@ayuda');
Route::get('/messages/{message}', 'MessagesController@show');

Auth::routes();

//middleware de auth
Route::group(['middleware' => 'auth'], function () {
  Route::post('/messages/create', 'MessagesController@create');
  Route::post('/{username}/dms', 'UsersController@sendPrivateMessage');
  Route::get('/conversations/{conversation}', 'UsersController@showConversation');

  Route::post('/{username}/follow', 'UsersController@follow');
  Route::post('/{username}/unfollow', 'UsersController@unfollow');
});
//middleware de auth

Route::get('/{username}/follows', 'UsersController@follows');
Route::get('/{username}/followers', 'UsersController@followers');
Route::get('/{username}', 'UsersController@show');
//
