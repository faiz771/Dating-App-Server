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

Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@redirectAdmin')->name('index');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {

    Route::get('/dashboard', 'App\Http\Controllers\Backend\DashboardController@index')->name('admin.dashboard');
    Route::resource('roles', 'App\Http\Controllers\Backend\RolesController', ['names' => 'admin.roles']);
    Route::resource('users', 'App\Http\Controllers\Backend\UsersController', ['names' => 'admin.users']);
    Route::resource('admins', 'App\Http\Controllers\Backend\AdminsController', ['names' => 'admin.admins']);


    // Login Routes
    Route::get('/login', 'App\Http\Controllers\Backend\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'App\Http\Controllers\Backend\Auth\LoginController@login')->name('admin.login.submit');

    // Logout Routes
    Route::post('/logout/submit', 'App\Http\Controllers\Backend\Auth\LoginController@logout')->name('admin.logout.submit');

    // Forget Password Routes
    Route::get('/password/reset', 'App\Http\Controllers\Backend\Auth\ForgetPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset/submit', 'App\Http\Controllers\Backend\Auth\ForgetPasswordController@reset')->name('admin.password.update');

   Route::get('/basic-controls', 'Admin\BasicController@index')->name('basic-controls');
        Route::post('/basic-controls', 'Admin\BasicController@updateConfigure')->name('basic-controls.update');

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
