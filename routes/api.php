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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});



/**
 * Routes accessible only to super admin
 */
Route::middleware(['auth:api', 'api.superAdmin'])->group(function () {
    // Auth Routes
    Route::post('/register', array('uses'=>'AuthController@register','name'=>'register'));
    Route::get('/users/datatable', array('uses'=>'web\UsersController@datatable'));
    Route::delete('/delete', array('uses'=>'AuthController@delete'));
    // --/Auth Routes
});
/**
 * --/Routes accessible only to super admin
 */


/**
 * Routes accessible super admin and editor
 */
Route::middleware(['auth:api', 'api.editor'])->group(function () {
    Route::put('/update/password', array('uses'=>'AuthController@updatePassword'));
    Route::put('/update', array('uses'=>'AuthController@update'));
});
/**
 * --/Routes accessible super admin and editor
 */


/**
 * Routes accessible super admin, editor and author
 */
Route::middleware(['auth:api', 'api.author'])->group(function () {

    //PestsDiseaseWeed Routes
    Route::post('pdw',array('uses'=>'PestsDiseaseWeedController@new'));
    Route::post('pdw/{id}/image',array('uses'=>'ImagesController@updateImage'));
    Route::put('pdw/{id}',array('uses'=>'PestsDiseaseWeedController@update'));
    Route::delete('pdw/{id}',array('uses'=>'PestsDiseaseWeedController@delete'));
    //--/PestsDiseaseWeed Routes

    //ActiveIngredients Routes
    Route::post('active_ingredients',array('uses'=>'ActiveIngredientsController@new'));
    Route::post('active_ingredients/{id}/image',array('uses'=>'ImagesController@updateImage'));
    Route::put('active_ingredients/{id}',array('uses'=>'ActiveIngredientsController@update'));
    Route::delete('active_ingredients/{id}',array('uses'=>'ActiveIngredientsController@delete'));
    //--/ActiveIngredients Routes

    //Agrochem Routes
    Route::post('agrochem',array('uses'=>'AgrochemController@new'));
    Route::post('agrochem/{id}/image',array('uses'=>'ImagesController@updateImage'));
    Route::put('agrochem/{id}',array('uses'=>'AgrochemController@update'));
    Route::delete('agrochem/{id}',array('uses'=>'AgrochemController@delete'));
    //--/Agrochem Routes

    //CommercialOrganic Routes
    Route::post('commercial_organic',array('uses'=>'CommercialOrganicController@new'));
    Route::post('commercial_organic/{id}/image',array('uses'=>'ImagesController@updateImage'));
    Route::put('commercial_organic/{id}',array('uses'=>'CommercialOrganicController@update'));
    Route::delete('commercial_organic/{id}',array('uses'=>'CommercialOrganicController@delete'));
    //--/CommercialOrganic Routes

    //GAP Routes
    Route::post('gap',array('uses'=>'GapController@new'));
    Route::post('gap/{id}/image',array('uses'=>'ImagesController@updateImage'));
    Route::put('gap/{id}',array('uses'=>'GapController@update'));
    Route::delete('gap/{id}',array('uses'=>'GapController@delete'));
    //--/GAP Routes

    //HomeMadeOrganic Routes
    Route::post('homemade_organic',array('uses'=>'HomeMadeOrganicController@new'));
    Route::post('homemade_organic/{id}/image',array('uses'=>'ImagesController@updateImage'));
    Route::put('homemade_organic/{id}',array('uses'=>'HomeMadeOrganicController@update'));
    Route::delete('homemade_organic/{id}',array('uses'=>'HomeMadeOrganicController@delete'));
    //--/HomeMadeOrganic Routes

    //LocalNames Routes
    Route::post('local_names',array('uses'=>'LocalNamesController@new'));
    Route::post('local_names/{id}/image',array('uses'=>'ImagesController@updateImage'));
    Route::put('local_names/{id}',array('uses'=>'LocalNamesController@update'));
    Route::delete('local_names/{id}',array('uses'=>'LocalNamesController@delete'));
    //--/LocalNames Routes

    //Crops Routes
    Route::post('crops',array('uses'=>'CropsController@new'));
    Route::post('crops/{id}/image/',array('uses'=>'ImagesController@updateImage'));
    Route::put('crops/{id}',array('uses'=>'CropsController@update'));
    Route::delete('crops/{id}',array('uses'=>'CropsController@delete'));
    //--/Crops Routes

    //CommercialOrganic Routes
    Route::post('control_methods',array('uses'=>'ControlMethodsController@new'));
    Route::post('control_methods/{id}/image/',array('uses'=>'ImagesController@updateImage'));
    Route::put('control_methods/{id}',array('uses'=>'ControlMethodsController@update'));
    Route::delete('control_methods/{id}',array('uses'=>'ControlMethodsController@delete'));
    //--/CommercialOrganic Routes

    //Images Routes
    Route::post('image',array('uses'=>'ImagesController@upload'));
    //--/Images Routes

});
/**
 * --/Routes accessible super admin, editor and author
 */


/**
 * Public Routes
 */
Route::get('/auth/signup/activate/{token}', array('uses'=>'AuthController@signupActivate','name'=>'signupActivate'));
Route::post('/login', array('uses'=>'AuthController@login'));
Route::post('/subscribe', array('uses'=>'AuthController@register','name'=>'register'));
Route::get('/logout', array('uses'=>'AuthController@logout'))->name('logout');


//Route::get('test/filter/{search_value}',array('uses'=>'ImagesController@test'));
Route::get('test/filter?/',array('uses'=>'ImagesController@test'));




//Downloads Routes
Route::post('downloads',array('uses'=>'Cms\DownloadsController@new'));
Route::post('downloads/entity/{entity_id}',array('uses'=>'Cms\DownloadsController@newWithAssociation'));
Route::post('downloads/{id}/file',array('uses'=>'Cms\DownloadsController@updateFile'));
Route::put('downloads/{id}',array('uses'=>'Cms\DownloadsController@update'));
Route::delete('downloads/{id}',array('uses'=>'Cms\DownloadsController@delete'));
//--/Downloads Routes




//Downloads Routes
Route::get('downloads',array('uses'=>'Cms\DownloadsController@all'));
Route::get('downloads/datatable',array('uses'=>'Cms\DownloadsController@dataTable'));
Route::get('downloads/filter/{search_value?}',array('uses'=>'Cms\DownloadsController@filter'));
Route::get('downloads/names',array('uses'=>'Cms\DownloadsController@getPestDiseasesWeedsNames'));
Route::get('downloads/summary/names/{search_value?}',array('uses'=>'Cms\DownloadsController@summaryNames'));
Route::get('downloads/summary/count/{search_value?}',array('uses'=>'Cms\DownloadsController@summaryCount'));
Route::get('downloads/{id}',array('uses'=>'Cms\DownloadsController@find'));
//--/Downloads Routes




//Media Routes
Route::post('media',array('uses'=>'Cms\MediaController@new'));
Route::post('media/entity/{entity_id}',array('uses'=>'Cms\MediaController@newWithAssociation'));
Route::post('media/{id}/file',array('uses'=>'Cms\MediaController@updateFile'));
Route::put('media/{id}',array('uses'=>'Cms\MediaController@update'));
Route::delete('media/{id}',array('uses'=>'Cms\MediaController@delete'));
//--/Media Routes




//Media Routes
Route::get('media',array('uses'=>'Cms\MediaController@all'));
Route::get('media/datatable',array('uses'=>'Cms\MediaController@dataTable'));
Route::get('media/filter/{search_value?}',array('uses'=>'Cms\MediaController@filter'));
Route::get('media/names',array('uses'=>'Cms\MediaController@getPestDiseasesWeedsNames'));
Route::get('media/summary/names/{search_value?}',array('uses'=>'Cms\MediaController@summaryNames'));
Route::get('media/summary/count/{search_value?}',array('uses'=>'Cms\MediaController@summaryCount'));
Route::get('media/token/{token}',array('uses'=>'Cms\MediaController@findByToken'));
Route::get('media/{id}',array('uses'=>'Cms\MediaController@find'));
//--/Media Routes




//Posts Routes
Route::post('posts',array('uses'=>'Cms\PostsController@new'));
Route::put('posts/{id}',array('uses'=>'Cms\PostsController@update'));
Route::delete('posts/{id}',array('uses'=>'Cms\PostsController@delete'));
//--/Posts Routes




//Posts Routes
Route::get('posts',array('uses'=>'Cms\PostsController@all'));
Route::get('posts/datatable',array('uses'=>'Cms\PostsController@dataTable'));
Route::get('posts/filter/{search_value?}',array('uses'=>'Cms\PostsController@filter'));
Route::get('posts/summary/names/{search_value?}',array('uses'=>'Cms\PostsController@summaryNames'));
Route::get('posts/summary/count/{search_value?}',array('uses'=>'Cms\PostsController@summaryCount'));
//Route::post('posts/{id}/comments',array('uses'=>'PostsController@findComments'));
Route::get('posts/year/{year}/month/{month}',array('uses'=>'Cms\PostsController@findByYearAndMonth'));
Route::get('posts/tag/{tag}',array('uses'=>'Cms\PostsController@findByTag'));
Route::get('posts/year/{year}',array('uses'=>'Cms\PostsController@findByYear'));
Route::get('posts/month/{month}',array('uses'=>'Cms\PostsController@findByMonth'));
Route::get('posts/{post_id}/comments',array('uses'=>'Cms\CommentsController@findByPost'));
Route::get('posts/{post_id}/downloads',array('uses'=>'Cms\PostsController@findDownloads'));
Route::get('posts/{post_id}/media',array('uses'=>'Cms\PostsController@findMedia'));
Route::get('posts/{id}',array('uses'=>'Cms\PostsController@find'));
//--/Posts Routes




//Comments Routes
Route::post('comments',array('uses'=>'Cms\CommentsController@new'));
Route::put('comments/{id}',array('uses'=>'Cms\CommentsController@update'));
Route::delete('comments/{id}',array('uses'=>'Cms\CommentsController@delete'));
//--/Comments Routes




//Comments Routes
Route::get('comments',array('uses'=>'Cms\CommentsController@all'));
Route::get('comments/filter/{search_value?}',array('uses'=>'Cms\CommentsController@filter'));
Route::get('comments/summary/count/{search_value?}',array('uses'=>'Cms\CommentsController@summaryCount'));
Route::get('comments/{id}',array('uses'=>'Cms\CommentsController@find'));
//--/Comments Routes












//Search Routes
Route::get('active_ingredients/search/{value?}',array('uses'=>'SearchController@searchActiveIngredients'));
Route::get('agrochem/search/{value?}',array('uses'=>'SearchController@searchAgrochem'));
Route::get('commercial_organic/search/{value?}',array('uses'=>'SearchController@searchCommercialOrganic'));
Route::get('crops/search/{value?}',array('uses'=>'SearchController@searchCrops'));
Route::get('gap/search/{value?}',array('uses'=>'SearchController@searchGap'));
Route::get('homemade_organic/search/{value?}',array('uses'=>'SearchController@searchHomemadeOrganic'));
Route::get('local_names/search/{value?}',array('uses'=>'SearchController@searchLocalNames'));
Route::get('pdw/search/{value?}',array('uses'=>'SearchController@searchPestDiseaseWeed'));
Route::get('search',array('uses'=>'SearchController@search'));
Route::get('search_alt/{value?}',array('uses'=>'SearchController@searchAlt'));
//--/Search Routes


//PestsDiseaseWeed Routes
Route::get('pdw',array('uses'=>'PestsDiseaseWeedController@all'));
Route::get('pdw/datatable',array('uses'=>'PestsDiseaseWeedController@dataTable'));
Route::get('pdw/filter/{search_value?}',array('uses'=>'PestsDiseaseWeedController@filter'));
Route::get('pdw/names',array('uses'=>'PestsDiseaseWeedController@getPestDiseasesWeedsNames'));
Route::get('pdw/summary/names/{search_value?}',array('uses'=>'PestsDiseaseWeedController@summaryNames'));
Route::get('pdw/summary/count/agrochems',array('uses'=>'PestsDiseaseWeedController@summaryCountAgrochem'));
Route::get('pdw/summary/count/commercial_organic',array('uses'=>'PestsDiseaseWeedController@summaryCountCommercialOrganic'));
Route::get('pdw/summary/count/control_methods',array('uses'=>'PestsDiseaseWeedController@summaryCountControlMethods'));
Route::get('pdw/summary/count/crops',array('uses'=>'PestsDiseaseWeedController@summaryCountCrops'));
Route::get('pdw/summary/count/gap',array('uses'=>'PestsDiseaseWeedController@summaryCountGap'));
Route::get('pdw/summary/count/homemade_organic',array('uses'=>'PestsDiseaseWeedController@summaryCountHomemadeOrganic'));
Route::get('pdw/summary/count/local_names',array('uses'=>'PestsDiseaseWeedController@summaryCountLocalNames'));
Route::get('pdw/summary/count/{search_value?}',array('uses'=>'PestsDiseaseWeedController@summaryCount'));
Route::get('pdw/{id}/agrochems',array('uses'=>'PestsDiseaseWeedController@findAgrochems'));
Route::get('pdw/{id}/commercial_organic',array('uses'=>'PestsDiseaseWeedController@findCommercialOrganic'));
Route::get('pdw/{id}/crops',array('uses'=>'PestsDiseaseWeedController@findCrops'));
Route::get('pdw/{id}/control_methods',array('uses'=>'PestsDiseaseWeedController@findControlMethods'));
Route::get('pdw/{id}/gap',array('uses'=>'PestsDiseaseWeedController@findGap'));
Route::get('pdw/{id}/homemade_organic',array('uses'=>'PestsDiseaseWeedController@findHomemadeOrganic'));
Route::get('pdw/{id}/local_names',array('uses'=>'PestsDiseaseWeedController@findLocalNames'));
Route::get('pdw/{id}',array('uses'=>'PestsDiseaseWeedController@find'));
//--/PestsDiseaseWeed Routes


//ActiveIngredients Routes
Route::get('active_ingredients',array('uses'=>'ActiveIngredientsController@all'));
Route::get('active_ingredients/filter/{search_value?}',array('uses'=>'ActiveIngredientsController@filter'));
Route::get('active_ingredients/datatable',array('uses'=>'ActiveIngredientsController@dataTable'));
Route::get('active_ingredients/names',array('uses'=>'ActiveIngredientsController@getActiveIngredientNames'));
Route::get('active_ingredients/summary/names/{search_value?}',array('uses'=>'ActiveIngredientsController@summaryNames'));
Route::get('active_ingredients/summary/count/agrochem',array('uses'=>'ActiveIngredientsController@summaryCountAgrochem'));
Route::get('active_ingredients/summary/count/{search_value?}',array('uses'=>'ActiveIngredientsController@summaryCount'));
Route::get('active_ingredients/{id}/agrochems',array('uses'=>'ActiveIngredientsController@findAgrochems'));
Route::get('active_ingredients/{id}/commercial_organic',array('uses'=>'ActiveIngredientsController@findCommercialOrganic'));
Route::get('active_ingredients/{id}/gap',array('uses'=>'ActiveIngredientsController@findGap'));
Route::get('active_ingredients/{id}/homemade_organic',array('uses'=>'ActiveIngredientsController@findHomemadeOrganic'));
Route::get('active_ingredients/{id}',array('uses'=>'ActiveIngredientsController@find'));
//--/ActiveIngredients Routes


//Agrochem Routes
Route::get('agrochem',array('uses'=>'AgrochemController@all'));
//Route::get('agrochem/filter/active_ingredients',array('uses'=>'AgrochemController@filterByActiveIngredients'));
//Route::get('agrochem/filter/crops',array('uses'=>'AgrochemController@filterByCrops'));
//Route::get('agrochem/filter/pdw',array('uses'=>'AgrochemController@filterByPestsDiseaseWeed'));
Route::get('agrochem/filter/{search_value?}',array('uses'=>'AgrochemController@filter'));
Route::get('agrochem/datatable',array('uses'=>'AgrochemController@dataTable'));
Route::get('agrochem/names',array('uses'=>'AgrochemController@getAgrochemNames'));
//Route::get('agrochem/summary/names/active_ingredients',array('uses'=>'AgrochemController@summaryNamesByActiveIngredients'));
//Route::get('agrochem/summary/names/crops',array('uses'=>'AgrochemController@summaryNamesByCrops'));
//Route::get('agrochem/summary/names/pdw',array('uses'=>'AgrochemController@summaryNamesByPestsDiseaseWeed'));
Route::get('agrochem/summary/names/{search_value?}',array('uses'=>'AgrochemController@summaryNames'));
//Route::get('agrochem/summary/count/active_ingredients',array('uses'=>'AgrochemController@summaryCountActiveIngredients'));
//Route::get('agrochem/summary/count/crops',array('uses'=>'AgrochemController@summaryCountCrops'));
//Route::get('agrochem/summary/count/pdw',array('uses'=>'AgrochemController@summaryCountPestsDiseaseWeed'));
Route::get('agrochem/summary/count/{search_value?}',array('uses'=>'AgrochemController@summaryCount'));
Route::get('agrochem/{id}/active_ingredients',array('uses'=>'AgrochemController@findActiveIngredients'));
Route::get('agrochem/{id}/commercial_organic',array('uses'=>'AgrochemController@findCommercialOrganic'));
Route::get('agrochem/{id}/crops',array('uses'=>'AgrochemController@findCrops'));
Route::get('agrochem/{id}/homemade_organic',array('uses'=>'AgrochemController@findHomemadeOrganic'));
Route::get('agrochem/{id}/gap',array('uses'=>'AgrochemController@findGap'));
Route::get('agrochem/{id}/pdw',array('uses'=>'AgrochemController@findPestsDiseasesWeeds'));
Route::get('agrochem/{id}',array('uses'=>'AgrochemController@find'));
//--/Agrochem Routes


//CommercialOrganic Routes
Route::get('commercial_organic',array('uses'=>'CommercialOrganicController@all'));
Route::get('commercial_organic/filter/{search_value?}',array('uses'=>'CommercialOrganicController@filter'));
Route::get('commercial_organic/datatable',array('uses'=>'CommercialOrganicController@dataTable'));
Route::get('commercial_organic/names',array('uses'=>'CommercialOrganicController@getCommercialOrganicNames'));
Route::get('commercial_organic/summary/names/{search_value?}',array('uses'=>'CommercialOrganicController@summaryNames'));
Route::get('commercial_organic/summary/count/control_methods',array('uses'=>'CommercialOrganicController@summaryCountControlMethods'));
Route::get('commercial_organic/summary/count/pdw',array('uses'=>'CommercialOrganicController@summaryCountPestsDiseaseWeed'));
Route::get('commercial_organic/summary/count/{search_value?}',array('uses'=>'CommercialOrganicController@summaryCount'));
Route::get('commercial_organic/{id}/agrochem',array('uses'=>'CommercialOrganicController@findAgrochemProducts'));
Route::get('commercial_organic/{id}/control_methods',array('uses'=>'CommercialOrganicController@findControlMethods'));
Route::get('commercial_organic/{id}/gap',array('uses'=>'CommercialOrganicController@findGap'));
Route::get('commercial_organic/{id}/homemade_organic',array('uses'=>'CommercialOrganicController@findHomemadeOrganic'));
Route::get('commercial_organic/{id}/pdw',array('uses'=>'CommercialOrganicController@findPestsDiseaseWeed'));
Route::get('commercial_organic/{id}',array('uses'=>'CommercialOrganicController@find'));
//--/CommercialOrganic Routes


//GAP Routes
Route::get('gap',array('uses'=>'GapController@all'));
Route::get('gap/filter/{search_value?}',array('uses'=>'GapController@filter'));
Route::get('gap/datatable',array('uses'=>'GapController@dataTable'));
Route::get('gap/names',array('uses'=>'GapController@getGapNames'));
Route::get('gap/summary/names/{search_value?}',array('uses'=>'GapController@summaryNames'));
Route::get('gap/summary/count/pdw',array('uses'=>'GapController@summaryCountPestsDiseaseWeed'));
Route::get('gap/summary/count/{search_value?}',array('uses'=>'GapController@summaryCount'));
Route::get('gap/{id}',array('uses'=>'GapController@find'));
Route::get('gap/{id}/pdw',array('uses'=>'GapController@findPestsDiseaseWeed'));
//--/GAP Routes


//HomeMadeOrganic Routes
Route::get('homemade_organic',array('uses'=>'HomeMadeOrganicController@all'));
Route::get('homemade_organic/filter/{search_value?}',array('uses'=>'HomeMadeOrganicController@filter'));
Route::get('homemade_organic/datatable',array('uses'=>'HomeMadeOrganicController@dataTable'));
Route::get('homemade_organic/names',array('uses'=>'HomeMadeOrganicController@getHomemadeOrganicNames'));
Route::get('homemade_organic/summary/names/{search_value?}',array('uses'=>'HomeMadeOrganicController@summaryNames'));
Route::get('homemade_organic/summary/count/pdw',array('uses'=>'HomeMadeOrganicController@summaryCountPestsDiseaseWeed'));
Route::get('homemade_organic/summary/count/{search_value?}',array('uses'=>'HomeMadeOrganicController@summaryCount'));
Route::get('homemade_organic/{id}',array('uses'=>'HomeMadeOrganicController@find'));
Route::get('homemade_organic/{id}/pdw',array('uses'=>'HomeMadeOrganicController@findPestsDiseaseWeed'));
//--/HomeMadeOrganic Routes


//LocalNames Routes
Route::get('local_names',array('uses'=>'LocalNamesController@all'));
Route::get('local_names/filter/{search_value?}',array('uses'=>'LocalNamesController@filter'));
Route::get('local_names/datatable',array('uses'=>'LocalNamesController@dataTable'));
Route::get('local_names/names',array('uses'=>'LocalNamesController@getLocalNameNames'));
Route::get('local_names/summary/names/{search_value?}',array('uses'=>'LocalNamesController@summaryNames'));
Route::get('local_names/summary/count/pdw',array('uses'=>'LocalNamesController@summaryCountPestsDiseaseWeed'));
Route::get('local_names/summary/count/{search_value?}',array('uses'=>'LocalNamesController@summaryCount'));
Route::get('local_names/{id}',array('uses'=>'LocalNamesController@find'));
Route::get('local_names/{id}/pdw',array('uses'=>'LocalNamesController@findPestsDiseaseWeed'));
//--/LocalNames Routes


//Crops Routes
Route::get('crops',array('uses'=>'CropsController@all'));
Route::get('crops/filter/{search_value?}',array('uses'=>'CropsController@filter'));
Route::get('crops/datatable',array('uses'=>'CropsController@dataTable'));
Route::get('crops/names',array('uses'=>'CropsController@getCropNames'));
Route::get('crops/summary/names/{search_value?}',array('uses'=>'CropsController@summaryNames'));
Route::get('crops/summary/count/agrochem',array('uses'=>'CropsController@summaryCountAgrochems'));
Route::get('crops/summary/count/pdw',array('uses'=>'CropsController@summaryCountPestsDiseasesWeeds'));
Route::get('crops/summary/count/{search_value?}',array('uses'=>'CropsController@summaryCount'));
Route::get('crops/{id}',array('uses'=>'CropsController@find'));
Route::get('crops/{id}/pdw/',array('uses'=>'CropsController@findPestsDiseasesWeeds'));
Route::get('crops/{id}/agrochem/',array('uses'=>'CropsController@findAgrochems'));
Route::get('crops/{id}/commercial_organic',array('uses'=>'CropsController@findCommercialOrganic'));
Route::get('crops/{id}/homemade_organic',array('uses'=>'CropsController@findHomemadeOrganic'));
Route::get('crops/{id}/gap',array('uses'=>'CropsController@findGap'));
//--/Crops Routes


//CommercialOrganic Routes
Route::get('control_methods',array('uses'=>'ControlMethodsController@all'));
Route::get('control_methods/filter/{search_value?}',array('uses'=>'ControlMethodsController@filter'));
Route::get('control_methods/datatable',array('uses'=>'ControlMethodsController@dataTable'));
Route::get('control_methods/names',array('uses'=>'ControlMethodsController@getControlMethodNames'));
Route::get('control_methods/summary/names/{search_value?}',array('uses'=>'ControlMethodsController@summaryNames'));
Route::get('control_methods/summary/count/commercial_organic',array('uses'=>'ControlMethodsController@summaryCountCommercialOrganic'));
Route::get('control_methods/summary/count/pdw',array('uses'=>'ControlMethodsController@summaryCountPestsDiseasesWeeds'));
Route::get('control_methods/summary/count/{search_value?}',array('uses'=>'ControlMethodsController@summaryCount'));
Route::get('control_methods/{id}',array('uses'=>'ControlMethodsController@find'));
Route::get('control_methods/{id}/pdw/',array('uses'=>'ControlMethodsController@findPestsDiseasesWeeds'));
Route::get('control_methods/{id}/commercial_organic/',array('uses'=>'ControlMethodsController@findCommercialOrganic'));
//--/CommercialOrganic Routes


//Images Routes
Route::get('image/{fileName}',array('uses'=>'ImagesController@getImageOriginalSize'));
Route::get('image/{dim}/{fileName}',array('uses'=>'ImagesController@getImageResizedSquare'));
Route::get('image/{dimX}/{dimY}/{fileName}',array('uses'=>'ImagesController@getImageResizedRectangle'));
//--/Images Routes


/**
 * Public Routes
 */
