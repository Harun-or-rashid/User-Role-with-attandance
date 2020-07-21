<?php

use Illuminate\Support\Facades\Route;

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
Route::get('',function (){
    return view('backend.login');
});
Route::get('list','EmployeeController@index');
Route::post('store','EmployeeController@store');


Route::get('signin/','LoginController@showLogin')->name('signin');
Route::post('login','LoginController@login')->name('login');
Route::get('out','LoginController@logOut')->name('logout');
Route::group(['middleware'=>['auth']],function (){
        Route::prefix('employees')->name('employee.')->group(function (){
            Route::get('/','EmployeeController@index')->name('index');
            Route::get('/show/{id}','EmployeeController@show')->name('show');
            Route::get('/create','EmployeeController@create')->name('create')->middleware('admin');
            Route::post('/store','EmployeeController@store')->name('store');
            Route::get('/edit/{id}','EmployeeController@edit')->name('edit');
            Route::post('/update/{id}','EmployeeController@update')->name('update');
            Route::get('/delete/{id}','EmployeeController@destroy')->name('delete');
            });
//        Route::get('contact','');



});



