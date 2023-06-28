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
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongsController;


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::resource('channels', 'ChannelsController');
Route::resource('playlists', 'PlaylistsController');
Route::get('playlists/delete/{id}', 'PlaylistsController@deletePlaylist');
Route::resource('songs', 'SongsController');
Route::post('songs/add/{id}', [SongsController::class,'add']);
Route::get('songs/delete/{id}', 'SongsController@deleteSong');

//Users Controller
//Route::resource('settings', 'UsersController');
Route::get('admin', 'UsersController@adminindex');
Route::post('admin/ban', 'UsersController@ban');
Route::delete('admin/del', 'UsersController@destroy');
Route::get('settings', 'UsersController@index');
Route::post('settings/{id}', 'UsersController@update');


Route::get('chat','ChatController@chat');
Route::post('send','ChatController@send');
