<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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


/**
 * Routes accessible only to super admin
 */
Route::middleware(['auth:web', 'api.superAdmin'])->group(function () {
    //Clients
    Route::get('/clients', array('uses' => 'web\AdminController@clients'));
    Route::get('/authorized_clients', array('uses' => 'web\AdminController@authorizedClients'));
    Route::get('/personal_access_tokens', array('uses' => 'web\AdminController@personalAccessTokens'));
    // --/Clients

    //Users
    Route::get('/users/dashboard', array('uses' => 'web\UsersController@dashboard'));
    Route::get('/users/new', array('uses' => 'web\UsersController@newUser'));
    Route::post('/users/new', array('uses' => 'web\UsersController@createUser'));
    Route::get('/users/{koan_user_id}/access_level/edit', array('uses' => 'web\UsersController@changeAccessLevel'));
    Route::post('/users/{koan_user_id}/access_level/edit', array('uses' => 'web\UsersController@updateAccessLevel'));
    Route::get('/users/{koan_user_id}/account/activate', array('uses' => 'web\UsersController@confirmActivateAccount'));
    Route::post('/users/{koan_user_id}/account/activate', array('uses' => 'web\UsersController@activateAccount'));
    Route::get('/users/{koan_user_id}/account/deactivate', array('uses' => 'web\UsersController@confirmDeactivateAccount'));
    Route::post('/users/{koan_user_id}/account/deactivate', array('uses' => 'web\UsersController@deactivateAccount'));
    Route::get('/users/{koan_user_id}/account/delete', array('uses' => 'web\UsersController@confirmDeleteAccount'));
    Route::post('/users/{koan_user_id}/account/delete', array('uses' => 'web\UsersController@deleteAccount'));
    // --/Clients

});
/**
 * Routes accessible only to super admin
 */


/**
 * Routes accessible super admin and editor
 */
Route::middleware(['auth:web', 'api.editor'])->group(function () {

});
/**
 * Routes accessible super admin and editor
 */


/**
 * Routes accessible super admin, editor and author
 */
Route::middleware(['auth:web', 'api.author'])->group(function () {
    // Users
    Route::get('/', array('uses' => 'web\AdminController@home'));
    Route::get('/users/{koan_user_id}/details', array('uses' => 'web\UsersController@viewProfile'));
    Route::get('/users/{koan_user_id}/edit', array('uses' => 'web\UsersController@editPersonalDetails'));
    Route::post('/users/{koan_user_id}/edit', array('uses' => 'web\UsersController@updatePersonalDetails'));
    Route::get('/users/{koan_user_id}/password/change', array('uses' => 'web\UsersController@changePassword'));
    Route::post('/users/{koan_user_id}/password/change', array('uses' => 'web\UsersController@updatePassword'));
    // --/Users

});
/**
 * Routes accessible super admin, editor and author
 */






/**
 * Public Routes
 */

// ADMIN ROUTES
Route::get('/login', array('uses'=>'web\AdminController@login'))->name('login');
Route::get('/logout', array('uses' => 'web\AdminController@webLogout'));
Route::post('/auth', array('uses' => 'web\AdminController@webLogin'));
// --/ADMIN ROUTES



// Download Routes
Route::get('/downloads/pdw', array('uses' => 'DownloadsController@allPestsDiseaseWeeds'));
// --/Download Routes

// Configuration Routes
//Route::get('/', array('uses'=>'InitController@index'));

//Clear Cache
Route::get('/clear-cache', array('uses'=>'InitController@clearCache'));

//Re-optimize class loader:
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

//Init passport:
Route::get('/init-passport', array('uses'=>'InitController@initPassport'));
// --/Config Routes


/**
 * Public Routes
 */


Auth::routes([
    'login' =>false,
    'logout' =>false,
    'register' => false,
//    'verify' => false
]);
//
//Route::get('/home', 'HomeController@index')->name('home');

