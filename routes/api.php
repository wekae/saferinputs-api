<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//PestsDiseaseWeed Routes
Route::post('pdw',array('uses'=>'PestsDiseaseWeedController@new'));
Route::get('pdw',array('uses'=>'PestsDiseaseWeedController@all'));
Route::get('pdw/{id}',array('uses'=>'PestsDiseaseWeedController@find'));
Route::get('pdw/filter/{search_value}',array('uses'=>'PestsDiseaseWeedController@filter'));
Route::get('pdw/datatable}',array('uses'=>'PestsDiseaseWeedController@dataTable'));
Route::put('pdw/{id}',array('uses'=>'PestsDiseaseWeedController@update'));
Route::delete('pdw/{id}',array('uses'=>'PestsDiseaseWeedController@delete'));


//ActiveIngredients Routes
Route::post('active_ingredients',array('uses'=>'ActiveIngredientsController@new'));
Route::get('active_ingredients',array('uses'=>'ActiveIngredientsController@all'));
Route::get('active_ingredients/{id}',array('uses'=>'ActiveIngredientsController@find'));
Route::get('active_ingredients/filter/{search_value}',array('uses'=>'ActiveIngredientsController@filter'));
Route::get('active_ingredients/datatable}',array('uses'=>'ActiveIngredientsController@dataTable'));
Route::put('active_ingredients/{id}',array('uses'=>'ActiveIngredientsController@update'));
Route::delete('active_ingredients/{id}',array('uses'=>'ActiveIngredientsController@delete'));


//Agrochem Routes
Route::post('agrochem',array('uses'=>'AgrochemController@new'));
Route::get('agrochem',array('uses'=>'AgrochemController@all'));
Route::get('agrochem/{id}',array('uses'=>'AgrochemController@find'));
Route::get('agrochem/filter/{search_value}',array('uses'=>'AgrochemController@filter'));
Route::get('agrochem/datatable}',array('uses'=>'AgrochemController@dataTable'));
Route::put('agrochem/{id}',array('uses'=>'AgrochemController@update'));
Route::delete('agrochem/{id}',array('uses'=>'AgrochemController@delete'));


//CommercialOrganic Routes
Route::post('commercial_organic',array('uses'=>'CommercialOrganicController@new'));
Route::get('commercial_organic',array('uses'=>'CommercialOrganicController@all'));
Route::get('commercial_organic/{id}',array('uses'=>'CommercialOrganicController@find'));
Route::get('commercial_organic/filter/{search_value}',array('uses'=>'CommercialOrganicController@filter'));
Route::get('commercial_organic/datatable}',array('uses'=>'CommercialOrganic@dataTable'));
Route::put('commercial_organic/{id}',array('uses'=>'CommercialOrganicController@update'));
Route::delete('commercial_organic/{id}',array('uses'=>'CommercialOrganicController@delete'));


//CommercialOrganic Routes
Route::post('gap',array('uses'=>'GapController@new'));
Route::get('gap',array('uses'=>'GapController@all'));
Route::get('gap/{id}',array('uses'=>'GapController@find'));
Route::get('gap/filter/{search_value}',array('uses'=>'GapController@filter'));
Route::get('gap/datatable}',array('uses'=>'GapController@dataTable'));
Route::put('gap/{id}',array('uses'=>'GapController@update'));
Route::delete('gap/{id}',array('uses'=>'GapController@delete'));


//HomeMadeOrganic Routes
Route::post('homemade_organic',array('uses'=>'HomeMadeOrganicController@new'));
Route::get('homemade_organic',array('uses'=>'HomeMadeOrganicController@all'));
Route::get('homemade_organic/{id}',array('uses'=>'HomeMadeOrganicController@find'));
Route::get('homemade_organic/filter/{search_value}',array('uses'=>'HomeMadeOrganicController@filter'));
Route::get('homemade_organic/datatable}',array('uses'=>'HomeMadeOrganicController@dataTable'));
Route::put('homemade_organic/{id}',array('uses'=>'HomeMadeOrganicController@update'));
Route::delete('homemade_organic/{id}',array('uses'=>'HomeMadeOrganicController@delete'));


//LocalNames Routes
Route::post('local_names',array('uses'=>'LocalNamesController@new'));
Route::get('local_names',array('uses'=>'LocalNamesController@all'));
Route::get('local_names/{id}',array('uses'=>'LocalNamesController@find'));
Route::get('local_names/filter/{search_value}',array('uses'=>'LocalNamesController@filter'));
Route::get('local_names/datatable}',array('uses'=>'LocalNamesController@dataTable'));
Route::put('local_names/{id}',array('uses'=>'LocalNamesController@update'));
Route::delete('local_names/{id}',array('uses'=>'LocalNamesController@delete'));


//Crops Routes
Route::post('crops',array('uses'=>'CropsController@new'));
Route::get('crops',array('uses'=>'CropsController@all'));
Route::get('crops/{id}',array('uses'=>'CropsController@find'));
Route::get('crops/filter/{search_value}',array('uses'=>'CropsController@filter'));
Route::get('crops/datatable}',array('uses'=>'CropsController@dataTable'));
Route::put('crops/{id}',array('uses'=>'CropsController@update'));
Route::delete('crops/{id}',array('uses'=>'CropsController@delete'));
