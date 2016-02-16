<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::model('doctors', 'Doctor'); 
Route::model('hospitals', 'Hospital'); 
Route::get('/', 'UsersController@index');
Route::get('/login', array('as' => 'login', 'uses' => 'UsersController@login'));
Route::post('/login', array('as' => 'login', 'uses' => 'UsersController@handleLogin'));
Route::post('/search', array('as' => 'search', 'uses' => 'UsersController@search'));
Route::post('/searchpage', array('as' => 'searchpage', 'uses' => 'UsersController@searchpage'));
Route::post('/profile', array('as' => 'profile', 'uses' => 'UsersController@profile'));
Route::get('/logout', array('as' => 'logout', 'uses' => 'UsersController@logout'));
Route::get('/register', array('as' => 'register', 'uses' => 'UsersController@create'));
Route::get('/profile/{photo}', ['as' => 'getentry', 'uses' => 'UsersController@getphoto']);
Route::resource('user', 'UsersController');
Route::resource('/profile', 'UsersController@profile');
/*Route::get('getphoto/{photo}', function ($photo)
{
	  $entry = User::where('photo', '=', $photo)->firstOrFail();
        $file = Storage::disk('local')->get($entry->photo);
 
        return (new Response($file, 200))->header('Content-Type', $entry->mime);
});*/
//Route::get('/getphoto/{photo}','UsersController@getphoto');