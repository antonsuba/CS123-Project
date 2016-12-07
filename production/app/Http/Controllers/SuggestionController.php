<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Suggestion;
use App\Place;
use App\Location;
use App\Activities;
use App\Http\Requests;
use App\Preference;
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

    public function createSuggestion(Request $request){
        $inputs = $request->input();
        print_r($inputs);
        $newSuggestion = new Suggestion;

        $newSuggestion->name = $inputs['name'];
        $newSuggestion->description = $inputs['suggestion-description'];
        //$newSuggestion->image_id = $imageID;
        $newSuggestion->rating = 0;
        $newSuggestion->rate_count = 0;
        $newSuggestion->popularity = 0;
        $newSuggestion->weight = 1;

        $suggestionLocation = Location::find($inputs['location']);
        $locationID = $suggestionLocation['id'];
        $newSuggestion->location_id = $locationID;
        
        $newSuggestion->save();

        $suggestionPreference = Preference::find($inputs['preference']);
        $newSuggestion->preferences()->attach($suggestionPreference['id']);

        $suggestionID = $newSuggestion->id;
        $newActivity = $this->createActivity($suggestionID, $inputs['activity-description'], $inputs['place-name']);
        /*foreach($activities as $activity){
            $suggestionID = $newSuggestion->id;
            $newActivity = $this->createActivity($suggestionID, $activity[0], $activity[1], $activity[2]);
        }*/

        //return view('home');
    }
}
