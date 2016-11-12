<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Suggestion;
use App\Http\Requests;

class RecommendationEngine extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getSuggestions($quantity){
        $suggestions = Suggestion;

    }

    public function getSuggestionsByCat($category, $quantity){
        $suggestions = Suggestion::where()
    }
}
