<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\RecommendationEngine;

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
        $result = $this->suggest(30);
        return view('home', ['suggestions' => $result]);
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
}
