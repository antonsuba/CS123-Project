<?php
namespace App\Http\Controllers;

use App\Activity;
use App\Place;
use App\Location;
use App\Suggestion;

trait SuggestionTraits{
    public function getSuggestionDetails($suggestionID){
        /*$suggestion = Suggestion::find($suggestionID);
        $name = $suggestion->name;
        $description = $suggestion->description;
        $location = Location::find($suggestion->location_id);
        $locationName = $location->name;*/

        $suggestionDetails = Suggestion::find($suggestionID)
                                ->join('locations', 'suggestions.location_id', '=', 'locations.id')
                                ->get(['suggestions.name AS name', 'suggestions.description', 'suggestions.rating', 'suggestions.img_src', 'locations.name AS city']);

        //$suggestionDetails = array($name, $description, $locationName);
        return $suggestionDetails;
    }

    public function getActivities($suggestionID){
        $suggestion = Suggestion::find($suggestionID);
        $activities = $suggestion->activities()
                        ->join('places', 'activities.place_id', '=', 'places.id')
                        ->get(['activities.suggestion_id', 'places.name', 'places.img_src', 'activities.description']);

        return $activities;
    }

    public function getPlaces($suggestionID){
        $suggestion = Suggestion::find($suggestionID);
        $activities = $suggestion->activities()->get();

        $i = 0;
        $places = array();
        foreach ($activities as $activity) {
            $place = $activity->place()->first();
            $places[$i] = $place;
            $i++;
        }

        return $places;
    }
}