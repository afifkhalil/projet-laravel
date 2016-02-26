<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::group(['middleware' => ['web']], function(){
   Route::resource('add-cars','CarsController');
});*/

Route::group(['middleware' => ['web']], function(){
   Route::get('cars',['as'=>'addcar', 'uses'=>'CarsController@index']);
   Route::post('cars/add-car','CarsController@store');
   Route::put('cars/edit','CarsController@edit');
   Route::get('cars/show/{id}', ['as'=>'show', 'uses'=>'CarsController@show']);
   Route::get('cars/list',['as'=>'list', 'uses'=>'CarsController@listcars']);
   Route::get('cars/affiche/{id}',['as'=>'affiche', 'uses'=>'CarsController@affiche']);
   //Route::get('cars/show/{$id}','CarsController@showCar');
});



Route::get('/', function () {
    return view('welcome');
});
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
