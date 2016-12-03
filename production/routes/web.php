<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*
|--------------------------------------------------------------------------
| View Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('landing');
});

Route::get('search',function(){
	return view('search');
});

Route::get('detail',function(){
	return view('detail');
});

/*Route::get('sh',function(){
	return view('searchHelp');
});*/

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Auth::routes();

Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback/{provider?}', 'Auth\AuthController@handleProviderCallback');

/*
|--------------------------------------------------------------------------
| Controller Routes
|--------------------------------------------------------------------------
*/
Route::get('/home', 'HomeController@index');
Route::get('/home/suggest/{categoryID}', 'HomeController@suggest');
Route::get('/home/detail/{suggestionID}', 'HomeController@detail');

Route::get('/create-an-experience', 'ExperienceController@index');
Route::get('/bookmark', 'BookmarkController@index');

Route::get('/suggestbycat/{categoryID}/{quantity}/{offset}', 'RecommendationEngine@getSuggestionsByCategory');
Route::get('/suggest/{quantity}/{offset}', 'RecommendationEngine@getSuggestions');

/*
|--------------------------------------------------------------------------
|Seeder Routes
|--------------------------------------------------------------------------
*/
Route::get('/seeder/seedall', 'Seeder@seedAll');
Route::get('/seeder/popcategories', 'Seeder@populateCategories');
Route::get('/seeder/poppreferences', 'Seeder@populatePreferences');
Route::get('/seeder/popsuggestions', 'Seeder@populateSuggestions');
Route::get('/seeder/popprefsuggestions', 'Seeder@populatePrefSuggestions');
Route::get('/seeder/popavailpref', 'Seeder@populateAvailPrefs');