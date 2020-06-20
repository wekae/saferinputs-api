<?php

use Illuminate\Support\Facades\Artisan;
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

Route::get('/', array('uses'=>'InitController@index'));

//Clear Cache facade value:
Route::get('/clear-cache', array('uses'=>'InitController@clearCache'));

//Reoptimized class loader:
Route::get('/optimize', array('uses'=>'InitController@optimize'));

//Route cache:
Route::get('/route-cache', array('uses'=>'InitController@routeCache'));

//Clear Route cache:
Route::get('/route-clear', array('uses'=>'InitController@routeClear'));

//Clear View cache:
Route::get('/view-clear', array('uses'=>'InitController@viewClear'));

//Clear Config cache:
Route::get('/config-cache', array('uses'=>'InitController@configCache'));

//Init cache:
Route::get('/init-cache', array('uses'=>'InitController@initCache'));


