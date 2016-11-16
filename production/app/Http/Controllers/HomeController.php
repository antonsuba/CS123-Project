<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\RecommendationEngine;
use App\Category;

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
    public function index()
    {
        $suggestions = $this->suggest(30);
        $categories = $this->getCategories();
        return view('home', ['suggestions' => $suggestions, 'categories' => $categories]);
    }

    public function suggest($quantity, $categoryID = NULL){
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
        $categories = Category::get(['id', 'name']);
        return $categories;
    }
}
