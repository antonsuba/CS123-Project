<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Suggestion;
use App\Place;
use App\Location;
use App\Activities;
use App\Http\Controllers\Traits;
use App\Http\Requests;

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

    public function createSuggestion($title, $description, $locationName, $activities){
        $newSuggestion = new Suggestion;

        $newSuggestion->name = $title;
        $newSuggestion->description = $description;

        $suggestionLocationID = Location::where('name', $locationName)->first()->id;
        $newSuggestion->location_id = $suggestionLocationID;
        $newSuggestion->save();

        foreach($activities as $activity){
            $suggestionID = $newSuggestion->id;
            $newActivity = $this->createActivity($suggestionID, $activity[0], $activity[1], $activity[2]);
        }
    }

    public function getSuggestionDetails($suggestionID){
        $suggestion = Suggestion::find($suggestionID);
        $name = $suggestion->name;
        $description = $suggestion->description;
        $location = Location::find($suggestion->location_id);
        $locationName = $location->name;

        $suggestionDetails = array($name, $description, $locationName);
        return $suggestionDetails;
    }

    public function getActivities($suggestionID){
        $suggestion = Suggestion::find($suggestionID);
        $activities = $suggestion->activities()->get();

        return $activities;
    }

    public function getPlaces($suggestionID){
        $suggestion = Suggestion::find($suggestionID);
        $activities = $suggestion->activities()->get();

        $i = 0;
        $places = array();
        foreach ($activities as $activity) {
            $place = $activity->place();
            $places[i] = $place;
            $i++;
        }

        return $places;
    }
}
