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

Route::filter('authenticate', function(){
	// DB::statement('call update_fine()');
	if ( !Session::has('username') ){
		
		return Redirect::to('/');
	}
});

Route::get('/', array('as'=>'signin', 'uses'=>'MainController@get_index'));

/*Route::post('/', array('uses'=>'MainController@post_index'));*/

Route::post('Signin', array('uses'=>'MainController@post_index'));

Route::group(['before' => 'authenticate'], function(){

	Route::get('logout', function(){
		Session::flush();
		return Redirect::to('/');
	});

	Route::controller('stock', 'StockController');
	Route::controller('employe', 'EmployeController');
	Route::controller('supplier', 'SupplierController');
	Route::controller('customer', 'CustomerController');
	
	Route::get('dashboard', function () {
    return view('index');
});

});//main group


/*Route::get('/', function () {
    return view('login');
});*/
Route::get('test',function(){

	return "Welcome to test";
});
