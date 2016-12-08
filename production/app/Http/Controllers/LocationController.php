<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Location;

class LocationController extends Controller
{
    //
	public function saveLocation(Request $request){
		$inputs = $request->input();
        $name = $inputs['name'];
		$lat = $inputs['lat'];
		$lng = $inputs['lng'];
		
		$location = new Location;
		$location->name = $name;
        $location->lat = $lat;
        $location->lng = $lng;
		
		$location->save();
		
		return response()->json("Location Saved");
		/*
        $location = new Location;
        $location->name = $name;
        $location->lat = $lat;
        $location->lng = $lng;
		
		$location->save();
		
        return response()->json("Location Saved");
		*/
    }
	
	public function getLocations(Request $request){ //request just having suggestionID
		
	}
}
