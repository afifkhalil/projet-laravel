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

Route::group(['prefix'=>'dashboard/cars',  'middleware' => ['web']], function(){
    //  Routes of Cars
   Route::get('/',['middleware' => ['permission:add-car'],'as'=>'carIndex', 'uses'=>'CarsController@index']);
   Route::post('add-car',[ 'as'=>'addcar', 'uses'=>'CarsController@store']);
   Route::put('edit','CarsController@edit');
   Route::get('list',['as'=>'carList', 'uses'=>'CarsController@listcars']);
   Route::get('affiche/{id}',['as'=>'affiche', 'uses'=>'CarsController@affiche']);
   
   
});
Route::group(['prefix'=>'dashboard/categories',  'middleware' => ['web']], function(){
   
   //  Routes of Catégories
   Route::get('/',['as'=>'categoryIndex', 'uses'=>'CategoriesController@index']);
   Route::post('/add',['as'=>'categoryStore', 'uses'=>'CategoriesController@store']);
   Route::post('/addoption',['as'=>'addoption', 'uses'=>'CategoriesController@addOpCat']);
   Route::delete('deleteCat/{id}',array('uses' => 'CategoriesController@destroyCat', 'as' => 'destroyCat'));
   Route::delete('deleteOpt/{id}',array('uses' => 'CategoriesController@destroyOpt', 'as' => 'destroyOpt'));

   
  
});


Route::group(['prefix'=>'dashboard/testDrive',  'middleware' => ['web']], function(){
   
   //  Routes of TestDrive
   
   Route::get('/',['as'=>'testDriveIndex', 'uses'=>'TestDrivesController@index']);
   Route::post('/addDisponibility',['as'=>'adddisp', 'uses'=>'TestDrivesController@store']);
   Route::get('/Calendar/{id}',['as'=>'Calendar', 'uses'=>'TestDrivesController@showCalendar']);
   Route::get('/hours/{date}/{car}',['as'=>'hours', 'uses'=>'TestDrivesController@showHours']);
   Route::post('/supp-day/{id}',['as'=>'supp-day', 'uses'=>'TestDrivesController@destroy']);
   Route::post('/add-hour/{id}',['as'=>'add-hour', 'uses'=>'TestDrivesController@addHour']);

   
  
});

//  Routes of Customers
Route::group(['prefix'=>'dashboard/customers','middleware' => ['web']], function(){
    //  Routes of Customers
Route::get('/',['as'=>'addcustomerIndex', 'uses'=>'CustomersController@index']);
Route::post('addcustomer', ['as'=>'addcustomer', 'uses'=>'CustomersController@store']);
Route::get('list',['as'=>'listCustomers', 'uses'=>'CustomersController@listcustomers']);
Route::get('affiche/{id}',['as'=>'afficheCustomer', 'uses'=>'CustomersController@affiche']);
Route::get('edit/{id}',['as'=>'editcustomer', 'uses'=>'CustomersController@edit']);
Route::put('update/{id}',['as'=>'updatecustomer', 'uses'=>'CustomersController@update']);
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

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
