<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Suggestion;
use App\Preference;
use App\Category;
use App\Http\Requests;

class RecommendationEngine extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getSuggestions($quantity){
        

    }

    public function getSuggestionsByCat($categoryID, $quantity){
        
    }
}
