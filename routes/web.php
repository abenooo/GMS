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
    return view('welcome');
});

Route::group([
    'prefix' => 'attendances',
], function () {
    Route::get('/', 'App\Http\Controllers\AttendancesController@index')
         ->name('attendances.attendance.index');
    Route::get('/create','App\Http\Controllers\AttendancesController@create')
         ->name('attendances.attendance.create');
    Route::get('/show/{attendance}','App\Http\Controllers\AttendancesController@show')
         ->name('attendances.attendance.show')->where('id', '[0-9]+');
    Route::get('/{attendance}/edit','App\Http\Controllers\AttendancesController@edit')
         ->name('attendances.attendance.edit')->where('id', '[0-9]+');
    Route::post('/', 'App\Http\Controllers\AttendancesController@store')
         ->name('attendances.attendance.store');
    Route::put('attendance/{attendance}', 'App\Http\Controllers\AttendancesController@update')
         ->name('attendances.attendance.update')->where('id', '[0-9]+');
    Route::delete('/attendance/{attendance}','App\Http\Controllers\AttendancesController@destroy')
         ->name('attendances.attendance.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'admin',
], function () {
    Route::get('/', 'App\Http\Controllers\Admin\AdminController@index')
         ->name('admin.admin.index');
    Route::get('/dashboard', 'App\Http\Controllers\Admin\AdminController@dashboard')
         ->name('admin.admin.dashboard');
    Route::get('/show/{attendance}','App\Http\Controllers\AttendancesController@show')
         ->name('attendances.attendance.show')->where('id', '[0-9]+');
    Route::get('/approve/{id}', 'App\Http\Controllers\Admin\AdminController@approve')
    ->name('admin.admin.approve');
    Route::get('/decline/{id}', 'App\Http\Controllers\Admin\AdminController@decline')
    ->name('admin.admin.decline');
     // Route::get('/', 'App\Http\Controllers\Admin\DashboardController@dashboard')
     //     ->name('admin.admin.dashboard');
     });