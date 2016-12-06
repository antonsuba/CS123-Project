<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Suggestion;
use App\Place;
use App\Location;
use App\Activities;
use App\Http\Requests;
use App\Http\Controllers\ActivityTraits;

class SuggestionController extends Controller
{
    /**
    *Handling Suggestions
    */

    use ActivityTraits;

    public function rateSuggestion($suggestionID, $rating){
        $sug = Suggestion::find($suggestionID);
        $oldRating = $sug->rating;
        //$newRating = ($oldRating + $rating)/somenumber

        $sug->update(['rating' => $rating]);
    }

    public function markSuggestionAsDone($suggestionID){
        
    }

    public function createSuggestion($title, $description, $locationName, $activities, $imageID){
        $newSuggestion = new Suggestion;

        $newSuggestion->name = $title;
        $newSuggestion->description = $description;

        $suggestionLocationID = Location::where('name', $locationName)->first()->id;
        $newSuggestion->location_id = $suggestionLocationID;
        $newSuggestion->image_id = $imageID;
        $newSuggestion->save();

        foreach($activities as $activity){
            $suggestionID = $newSuggestion->id;
            $newActivity = $this->createActivity($suggestionID, $activity[0], $activity[1], $activity[2]);
        }
    }
}
