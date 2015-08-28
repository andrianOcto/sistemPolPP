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


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//route digunakan sebelum pengguna login
Route::group(['middleware' => 'guest'], function () {
	
    Route::get('/login', 'LoginController@getLogin');
    Route::post('/login', 'LoginController@postLogin');
});


//digunakan untuk routing kalau udah login
Route::group(['middleware' => 'auth'], function () {
    
     Route::get('/', 'DashboardController@getIndex');
     Route::get('/logout', 'DashboardController@getLogout');

     //Route Admin
     Route::get('/admin','Admin\AdminController@getIndex');
     Route::post('/admin/register','Admin\AdminController@postRegister');
     Route::post('/admin/update','Admin\AdminController@postUpdate');
     Route::post('/admin/delete/{username}','Admin\AdminController@postDelete');
     // Route Master Setting Satuan Kerja
     Route::get('/satuanKerja','Master\setKerjaController@getIndex');
     // Route Master Setting Urusan
     Route::get('/urusan','Master\UrusanController@getIndex');
     Route::post('/urusan/add','Master\UrusanController@postUrusan');
     Route::post('/urusan/update','Master\UrusanController@postUpdate');
     Route::post('/urusan/delete/{id}','Master\UrusanController@postDelete');
     // Route Master Setting Bidang
     Route::get('/bidang','Master\BidangController@getIndex');
     Route::post('/bidang/add','Master\BidangController@postBidang');
     Route::post('/bidang/update','Master\BidangController@postUpdate');
     Route::post('/bidang/delete/{id}','Master\BidangController@postDelete');
     // Route Master Setting Kelompok Belanja
     Route::get('/kelompokBelanja','Master\KelompokBelanjaController@getIndex');
     Route::post('/belanja/add','Master\KelompokBelanjaController@postKelompok');
     Route::post('/kelompokBelanja/update','Master\KelompokBelanjaController@postUpdate');
     Route::post('/kelompokBelanja/delete/{id}','Master\KelompokBelanjaController@postDelete');
});




