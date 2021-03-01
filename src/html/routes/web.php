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

Route::get('/', function () {
    return view('cms/dashboard/DsMaster');
});
Route::get('cms','ManualAuth\AuthController@index')->name('LoginView');
Route::prefix('auth')->group(function() {
    Route::post('check','ManualAuth\AuthController@authenticate')->name('authcheck');
    Route::get('registview','ManualAuth\AuthController@regist')->name('RegistView');
    Route::post('regist','ManualAuth\AuthController@create')->name('authregist');
});