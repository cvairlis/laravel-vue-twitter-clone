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

Route::get('/', ['middleware' =>'guest', function(){
    return view('auth.loginRegister');
}]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile/{username}', 'ProfileController@show');

Route::get('/tweet/post', 'PostController@show');

Route::get('/users/list', 'UsersListController@show');