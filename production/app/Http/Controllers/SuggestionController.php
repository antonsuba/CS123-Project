<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Suggestion;
use App\Place;
use App\Location;
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

    public function createSuggestion($title, $description, $locationName, $places){
        $newSuggestion = new Suggestion;

        $newSuggestion->name = $title;
        $newSuggestion->description = $description;

        $suggestionLocationID = Location::where('name', $locationName)->first()->id;
        $newSuggestion->location_id = $suggestionLocationID;
        $newSuggestion->save();

        foreach($places as $placeArray){
            $location = Location::where('name', $placeArray[1])->first();
            $RowCount = Place::where(['name' => $placeArray[0], 'location_id' => $location->id])->get()->count();
            //$locationRowCount = Location::where('name', $placeArray[1])->get()->count();
            if(RowCount > 0){
                $place = Place::where('name', $placeArray[0])->first();
            } else{
                $place = new Place;
                $place->name = $placeArray[0];
                $place->description = $placeArray[1];
                $placeLocationID = Location::where('name', $placeArray[2])->first()->id;
                $place->location_id = $placeLocationID;
                $place->save();
            }
            $newSuggestion->places()->attach($place->id);
        }
    }
}
