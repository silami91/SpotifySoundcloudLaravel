<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'hello');

Route::get('/login', array('as' => 'login', 'uses' => 'ListenController@login'));

Route::post('/login', array('as' => 'login', 'uses' => 'ListenController@auth'));

Route::get('/search', array('as' => 'search', 'uses' => 'ListenController@search'));

Route::get('/display', array('as' => 'display', 'uses' => 'ListenController@display'));

Route::get('/logout', array('as' => 'logout', 'uses' => 'ListenController@logout'));

Route::get('/save', function()
{
    $favorite = new Favorite();
    $favorite->spotify = Input::get('spotify');
    $favorite->soundcloud = Input::get('soundcloud');
    $favorite->display_name = Input::get('display_name');
    dd($favorite);
    $favorite->save();
});

Route::get('/add', function()
{
    $user = new User();
    $user->email = "david";
    $user->password = Hash::make('laravel');
    $user->save();
});