<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SuggestionController extends Controller
{
    /**
    *Handling Suggestions
    */

    public function rateSuggestion($suggestionID, $rating){
        $sug = Suggestion::find($suggestionID);
        $oldRating = $sug->rating;
        //$newRating = ($oldRating + $rating)/somenumber

        $sug->update(['rating' => $rating]);
    }

    public function markSuggestionAsDone($suggestionID){
        
    }

    public function createSuggestion($title, $description, $location, $placesArray){
        
    
    }
}
