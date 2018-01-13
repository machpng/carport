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
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'user'], function () {
        Route::get('/add', 'UserController@add');
        Route::post('/store', 'UserController@store');
        Route::post('/store', 'UserController@store');
        Route::get('/edit/{id}', 'UserController@edit');
        Route::post('/update/{id}', 'UserController@update');
        Route::get('/destory/{id}', 'UserController@destory');
        Route::get('/', 'UserController@index')->name('user');
    });

    Route::group(['prefix' => 'parking'], function () {
        Route::get('/add', 'ParkingController@create');
        Route::post('/store', 'ParkingController@store');
        Route::get('/edit/{id}', 'ParkingController@edit');
        Route::get('/detail/{id}', 'ParkingController@detail');
        Route::post('/update/{id}', 'ParkingController@update');
        Route::get('/destory/{id}', 'ParkingController@destory');
        Route::get('/part/{id}', 'ParkingController@parts');
        Route::get('/policy/{id}', 'ParkingController@policy');
        Route::post('/do-policy/{id}', 'ParkingController@doPolicy');
        Route::get('/policies/{id}', 'ParkingController@policies');
        Route::get('/edit-policy/{id}', 'ParkingController@editPolicy');
        Route::post('/update-policy/{id}', 'ParkingController@updatePolicy');
        Route::get('/delete-policy/{id}', 'ParkingController@deletePolicy');
        Route::get('/', 'ParkingController@index')->name('parking');
    });

    Route::group(['prefix' => 'about'], function () {
        Route::post('/update', 'AboutController@update');

        Route::get('/', 'AboutController@index')->name('about');
    });

    Route::group(['prefix' => 'part'], function () {
        Route::get('/index', 'PartController@index');
        Route::get('/add', 'PartController@add');
        Route::post('/store', 'PartController@store');
        Route::get('/edit/{id}', 'PartController@edit');
        Route::post('/update/{id}', 'PartController@update');
        Route::get('/parking', 'PartController@parking');

        Route::get('/', 'PartController@index')->name('parts');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/add', 'ProductController@add');
        Route::post('/store', 'ProductController@store');
        Route::get('/edit/{id}', 'ProductController@edit');
        Route::get('/detail/{id}', 'ProductController@detail');
        Route::post('/update/{id}', 'ProductController@update');
        Route::get('/destory/{id}', 'ProductController@destory');

        Route::get('/', 'ProductController@index')->name('product');
    });
    Route::post('/upload', 'HomeController@upload')->name('upload');

    Route::get('/', 'HomeController@index');

    Route::get('fault','FaultController@index');

});

Route::group(['prefix' => 'customer'], function () {
    Route::get('/parking-list', 'CustomerController@parkingList');
    Route::get('/go/{id}', 'CustomerController@goParking');
    Route::get('/about', 'CustomerController@about');
    Route::get('/', 'CustomerController@index')->name('customer');
    Route::get('/log-list', 'CustomerController@logList');
    Route::get('/product-list', 'CustomerController@ProductList');
    Route::get('/ucenter', 'CustomerController@ucenter');
    Route::get('/detail/{id}', 'CustomerController@detail');
});