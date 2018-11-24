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

//Route::get('/', function () {
    //return view ('welcome');
//});

Route::get('hello/{name}',function($name){
    return 'hello'. $name;
});
//Route::get('/','HelloController@index');//HelloController nama controller, index adalah method nya

Route::get('hello/controller/{name}','HelloController@show');
Route::get('hello/controller/{name}/{age}','HelloController@show1');
//parameter optional
Route::get('hello/controller2/{name}/umur/{age?}','HelloController@withCondition');
//bootstrap views


//Route::resource('category','CategoryController');
//Route::resource('product','ProductController');

Auth::routes();
Route::get('/', 'Auth\LoginController@ShowLoginForm');
Route::get('/logout', 'Auth\LoginController@logout');

Route::middleware('auth')->group(function(){
    Route::get('/home','HomeController@index')->name('home');
    Route::resource('category','CategoryController');
    Route::resource('product','ProductController');
});
