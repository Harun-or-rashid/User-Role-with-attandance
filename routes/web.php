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
Route::get('test',function (){
    return view('employee.create');
});
Route::post('store','EmployeeController@store');

Route::get('/','LoginController@showLogin');
Route::post('login','LoginController@login')->name('login');
Route::get('out','LoginController@logOut')->name('logout');
