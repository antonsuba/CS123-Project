<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

use App\Suggestion;
use App\Preference;
use App\Category;
use App\AvailPref;
use Illuminate\Support\Facades\Auth;

class RecommendationEngine extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getSuggestions($quantity, $offset){
        $suggestions = Preference::whereIn('preferences.id', AvailPref::where('user_id', '=', auth()->user()->id)->get(['preference_id']))
                        ->join('preference_suggestion', 'preferences.id', '=', 'preference_suggestion.preference_id')
                        ->join('suggestions', 'preference_suggestion.suggestion_id', '=', 'suggestions.id')
                        ->join('avail_prefs', 'preferences.id', '=', 'avail_prefs.preference_id')
                        ->orderBy('real_weight')
                        ->limit($quantity)
                        ->offset($offset)                     
                        ->get(['suggestions.id', 'suggestions.name', 'suggestions.rating', 'suggestions.location_id', 'suggestions.weight', 'suggestions.img_src', 'avail_prefs.recency_score', 
                                DB::raw('suggestions.weight * avail_prefs.recency_score as real_weight')]);

        return $suggestions;
    }

    public function getSuggestionsByCategory($categoryID, $quantity, $offset){
        $suggestions = Preference::where('category_id', '=', $categoryID)
                        ->whereIn('preferences.id', AvailPref::where('user_id', '=', auth()->user()->id)->get(['preference_id']))
                        ->join('preference_suggestion', 'preferences.id', '=', 'preference_suggestion.preference_id')
                        ->join('suggestions', 'preference_suggestion.suggestion_id', '=', 'suggestions.id')
                        ->join('avail_prefs', 'preferences.id', '=', 'avail_prefs.preference_id')
                        ->orderBy('real_weight')
                        ->limit($quantity)
                        ->offset($offset)
                        ->get(['suggestions.id', 'suggestions.name', 'suggestions.rating', 'suggestions.location_id', 'suggestions.weight', 'suggestions.img_src', 'avail_prefs.recency_score', 
                                DB::raw('suggestions.weight * avail_prefs.recency_score as real_weight')]);

        return $suggestions;
    }

    public function calculateSuggestionWeight($score, $popularity){
        $scoreMultiplier = 1;
        $popularityMultiplier = 1;

        return 1 / ( ($score * $scoreMultiplier) + ($popularity * $popularityMultiplier) );
    }

    public function calculateRealWeight($suggestionWeight, $recencyScore){
        return $suggestionWeight * $recencyScore;
    }

    public function updateSuggestionRating(Request $request){
		
		$inputs = $request->input();
        $suggestionID = $inputs['suggestionID'];
		$score = $inputs['score'];

        $suggestion = Suggestion::find($suggestionID);
        $rateCount = $suggestion->rate_count;
        $previousRating = $suggestion->rating;
        $newRating = ($score + $previousRating)/($rateCount + 1);
        $suggestion->rate_count = $rateCount + 1;
		
		$suggestion->save();
		
        return response()->json("Rated");
		
    }

    public function updateSuggestionPopularity($suggestionID, $increment){
        $suggestion = Suggestion::find($suggestionID);

        $newPopularity = $suggestion->popularity + $increment;
        $suggestion->popularity =  $newPopularity;

        $suggestion->save();
    }

    public function updateRecencyScore($availPrefID, $increment){
        $availPref = AvailPref::find($availPrefID);
        
        

        $availPref->save();
    }

    public function updateSuggestionWeight($suggestionID){
        $suggestion = Suggestion::find($suggestionID);
        $score = $suggestion->rating;
        $popularity = $suggestion->popularity;

        $suggestion->weight = $this->calculateSuggestionWeight($score, $popularity);
    }

    public function updateRealWeight($suggestionID){
        $availPref = AvailPref::where(['suggestion_id' => $suggestionID, 'user_id' => Auth::id()])->first();
        $suggestion = Suggestion::find($suggestionID);

        
    }
    
}