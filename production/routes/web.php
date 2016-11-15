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

Route::get('/', function () {
    return view('landing');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/suggestbycat/{categoryID}/{quantity}', 'RecommendationEngine@getSuggestionsByCategory');
Route::get('/suggest/{quantity}', 'RecommendationEngine@getSuggestions');

//Seeder Routes
Route::get('/seeder/seedall', 'Seeder@seedAll');
Route::get('/seeder/popcategories', 'Seeder@populateCategories');
Route::get('/seeder/poppreferences', 'Seeder@populatePreferences');
Route::get('/seeder/popsuggestions', 'Seeder@populateSuggestions');
Route::get('/seeder/popprefsuggestions', 'Seeder@populatePrefSuggestions');
Route::get('/seeder/popavailpref', 'Seeder@populateAvailPrefs');