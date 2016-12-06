<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LocationController extends Controller
{
    //
	public function saveLocation($locationData){
        $name = $locationData['name'];
		$lat = $locationData['lat'];
		$lng = $locationData['lng'];

        $location = new Location;
		$location->name = $name;
		$location->lat = $lat;
		$location->lng = $lng;
        $location->save();
		
        return response()->json("Location Saved");
    }
}
