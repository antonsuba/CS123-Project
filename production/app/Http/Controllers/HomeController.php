<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\RecommendationEngine;
use App\Category;
use App\Suggestion;
use App\Http\Controllers\Traits;

// use Facebook\FacebookSession;
// use Facebook\FacebookRedirectLoginHelper;
// use Facebook\FacebookRequest;
// use Facebook\FacebookAuthorizationException;
// use Facebook\FacebookRequestException;

// session_start();
// require_once __DIR__ . '/Facebook/autoload.php';

class HomeController extends Controller
{   
    use SuggestionTraits;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    /*
    |--------------------------------------------------------------------------
    | Suggestions
    |--------------------------------------------------------------------------
    */

    public function index(){
        $suggestions = $this->getSuggestions(30);
        $categories = $this->getCategories();
        return view('home', ['suggestions' => $suggestions, 'categories' => $categories]);
    }

    public function suggest($categoryID){
        $suggestions = $this->getSuggestions(30, $categoryID);
        $categories = $this->getCategories();
        return view('home', ['suggestions' => $suggestions, 'categories' => $categories]);
    }

    public function getSuggestions($quantity, $categoryID = NULL){
        $engine = new RecommendationEngine;

        if($categoryID == NULL){
            $suggestions = $engine->getSuggestions($quantity, 0);
        }
        else{
            $suggestions = $engine->getSuggestionsByCategory($categoryID, $quantity, 0);
        }

        return $suggestions;
    }

    public function getCategories(){
        $categories = Category::orderBy('name')->get(['id', 'name']);
        return $categories;
    }

    /*
    |--------------------------------------------------------------------------
    | Suggestion Detail
    |--------------------------------------------------------------------------
    */

    public function detail($suggestionID){
        $details = $this->getSuggestionDetails($suggestionID);
        $activities = $this->getActivities($suggestionID);
        $places = $this->getPlaces($suggestionID);
        $friendsList = $this->getFriends();
        return view('detail', ['details' => $details, 'activities' => $activities, 'places' => $places, 'friendsList' => $friendsList]);
    }

    public function getFriends(){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => "https://graph.facebook.com/v2.8/me?fields=id%2Cname%2Cfriends%7Bid%2Cname%2Cpicture%7D&access_token=EAAZA5VkYmOUEBAIHqGOPdbaFcZBNgMbpk9pbeZAzWA3AbJxxJHoZBKfeBrMLfOYHVqOQxVVC8qZCR1vGwpN8xptdj4BjR9rYCWNpb0U7ZAgx54VbMSk0KySRCBdLj8fx1GXG0RfbbAfamd9nKuTbwkzyqXEHRWkdLjIa3uJHkPhQZDZD",
            CURLOPT_USERAGENT => 'curl/7.47.0'
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        
        $jsonResponse = json_decode($response, true);

        //dd($jsonResponse['friends']['data']);

        return 1;

        //return $jsonResponse['friends']['data'];
    }
}
