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

Auth::routes();

Route::get('/','PagesController@inicio');
Route::get('/ayuda','PagesController@ayuda');
Route::get('/students','StudentsController@students');
Route::get('/students/{student}','StudentsController@show');

Route::get('/messages', 'MessagesController@search');
Route::get('/messages/{message}', 'MessagesController@show');

Route::get('/{username}', 'UsersController@show');
Route::get('/{username}/follows', 'UsersController@follows');
Route::get('/{username}/followers', 'UsersController@followers');



//middleware de auth
Route::group(['middleware' => 'auth'], function () {
  Route::post('/messages/create', 'MessagesController@create');
  Route::post('/{username}/dms', 'UsersController@sendPrivateMessage');
  Route::get('/conversations/{conversation}', 'UsersController@showConversation');

  Route::post('/{username}/follow', 'UsersController@follow');
  Route::post('/{username}/unfollow', 'UsersController@unfollow');
});
//middleware de auth



//
