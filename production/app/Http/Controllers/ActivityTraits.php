<?php
namespace App\Http\Controllers;

use App\Activity;
use App\Place;
use App\Location;

trait ActivityTraits {

    public function createActivity($suggestionID, $description, $placeName, $locationName, $imageID) {
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
                $place->image_id = $imageID;
                $place->save();
            }
            $activity->place_id = $place->id;

            return $activity;
    }


}