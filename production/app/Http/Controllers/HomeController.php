<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\RecommendationEngine;
use App\Category;
use App\Suggestion;

class HomeController extends Controller
{   
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
        $details = Suggestion::where('id', '=', $suggestionID)
                    ->first();
        return view('detail', ['details' => $details]);
    }
}
