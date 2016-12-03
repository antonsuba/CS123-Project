<?php
namespace App\Http\Controllers;

use App\Activity;
use App\Place;
use App\Location;

trait ActivityTraits {

    public function createActivity($suggestionID, $description, $placeName, $locationName) {
            $activity = new Activity;
            $activity->suggestion_id = $suggestionID;
            $activity->description = $description;
            $activity->save();

            $location = Location::where('name', $locationName)->first();
            $RowCount = Place::where(['name' => $placeName, 'location_id' => $location->id])->get()->count();
            if(RowCount > 0){
                $place = Place::where('name', $placeName)->first();
            } else{
                $place = new Place;
                $place->name = $placeName;
                //$place->description = $placeArray[1];
                $place->location_id = $location->id;
                $place->save();
            }
            $activity->place_id = $place->id;

            return $activity;
    }


}

trait SuggestionTraits{
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