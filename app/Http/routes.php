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
Route::model('labs','Lab');

//Route::get('/', 'UsersController@index');
Route::get('/', array('as' => '/', 'uses' => 'UsersController@index'));
Route::get('/login', array('as' => 'login', 'uses' => 'UsersController@login'));
Route::post('/login', array('as' => 'login', 'uses' => 'UsersController@handleLogin'));
Route::post('/search', array('as' => 'search', 'uses' => 'UsersController@search'));
Route::post('/hosall', array('as' => 'hosall', 'uses' => 'HospitalsController@search'));
Route::post('/docall', array('as' => 'docall', 'uses' => 'DoctorsController@search'));
Route::post('/laball', array('as' => 'laball', 'uses' => 'LabsController@search'));
Route::post('/searchpage', array('as' => 'searchpage', 'uses' => 'UsersController@searchpage'));
Route::post('/profile', array('as' => 'profile', 'uses' => 'UsersController@profile'));
Route::get('/logout', array('as' => 'logout', 'uses' => 'UsersController@logout'));
Route::get('/register', array('as' => 'register', 'uses' => 'UsersController@create'));
Route::get('/reghospital', array('as' => 'reghospital', 'uses' => 'HospitalsController@create'));
Route::get('/hosall', array('as' => 'hosall', 'uses' => 'HospitalsController@hosall'));
Route::get('/docall', array('as' => 'docall', 'uses' => 'DoctorsController@docall'));
Route::get('/docall/{id}', array('as' => 'doclistall', 'uses' => 'DoctorsController@doclistall'));
Route::get('/reglab', array('as' => 'reglab', 'uses' => 'LabsController@create'));
Route::get('/laball', array('as' => 'laball', 'uses' => 'LabsController@laball'));
Route::get('/regdoctor', array('as' => 'regdoctor', 'uses' => 'DoctorsController@create'));
Route::get('/profile/{photo}', ['as' => 'getentry', 'uses' => 'UsersController@getphoto']);
Route::get('/doctor/{id}', array('as' => 'doctor', 'uses' => 'UsersController@docdetail'));
Route::get('/hospital/{id}', array('as' => 'hospital', 'uses' => 'UsersController@hosdetail'));;
Route::get('/lab/{id}', array('as' => 'lab', 'uses' => 'UsersController@labdetail'));
Route::get('/edit/{id}', array('as' => 'edit', 'uses' => 'UsersController@edit'));
Route::post('/update/{id}', array('as' => 'update', 'uses' => 'UsersController@update'));
//Route::get('doctor/{id}','UsersController@docdetail');

Route::resource('user', 'UsersController');
Route::resource('hospital', 'HospitalsController');
Route::resource('doctor', 'DoctorsController');
Route::resource('lab', 'LabsController');
Route::resource('/profile', 'UsersController@profile');

/*

URL will be like this

domain.com/hospital/hosall
domain.com/hospital/reghospital
domain.com/hosall

And can be used like this

route('hospital::hosall');
route('hospital::reghospital');
route('hospital::hosall');

Route::group([
    'as'    => 'hospital::',
    'prefix'=> 'hospital',
], function () {
    Route::post('hosall', array('as' => 'hosall', 'uses' => 'HospitalsController@search'));
    Route::get('/reghospital', array('as' => 'reghospital', 'uses' => 'HospitalsController@create'));
    Route::get('/hosall', array('as' => 'hosall', 'uses' => 'HospitalsController@hosall'));
});*/
