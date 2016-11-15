<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

use App\Suggestion;
use App\Preference;
use App\Category;
use App\AvailPref;

class RecommendationEngine extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getSuggestions($quantity){
        DB::enableQueryLog();

        $preferences = Preference::whereIn('preferences.id', AvailPref::get(['preference_id']))
                        ->join('preference_suggestion', 'preferences.id', '=', 'preference_suggestion.preference_id')
                        ->join('suggestions', 'preference_suggestion.suggestion_id', '=', 'suggestions.id')
                        ->orderBy('weight')
                        ->limit($quantity)
                        ->get(['suggestions.id', 'suggestions.name', 'rating', 'location', 'weight']);

        foreach($preferences as $preference){
            echo $preference . '<br>';
        }

        print_r(auth()->user());

        dd(DB::getQueryLog());
    }

    public function getSuggestionsByCategory($categoryID, $quantity){
        DB::enableQueryLog();

        /*$preferences = Preference::where('category_id', '=', $categoryID)
            ->with(['suggestions' => function($query){
                $query->select('name', 'rating', 'location', 'weight');
            }])->get(['id']);*/

        $preferences = Preference::where('category_id', '=', $categoryID)
                        ->whereIn('preferences.id', AvailPref::get(['preference_id']))
                        ->join('preference_suggestion', 'preferences.id', '=', 'preference_suggestion.preference_id')
                        ->join('suggestions', 'preference_suggestion.suggestion_id', '=', 'suggestions.id')
                        ->orderBy('weight')
                        ->limit($quantity)
                        ->get(['suggestions.id', 'suggestions.name', 'rating', 'location', 'weight']);

        foreach($preferences as $preference){
            echo $preference . '<br>';
        }

        dd(DB::getQueryLog());
    }
}