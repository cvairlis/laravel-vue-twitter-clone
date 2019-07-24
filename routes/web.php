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

Route::get('/', ['middleware' =>'guest', function(){
    return view('auth.loginRegister');
}]);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/profile/{username}', 'ProfileController@index')->name('profile.show');

    Route::get('/post/tweet', 'PostsController@create')->name('tweet.show');

    Route::post('/post', 'PostsController@store')->name('tweet.store');

    Route::get('/users/list', 'UsersListController@show');
});

