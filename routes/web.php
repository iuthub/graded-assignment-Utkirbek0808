<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
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

Route::get('/', 'TasksController@index');

Route::post('store-tasks', ['uses' => 'TasksController@store', 'middleware' => 'task']);

Route::get('{id}/edit', ['uses' => 'TasksController@edit', 'middleware' => 'task']);

Route::post('{id}/update', 'TasksController@update');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
