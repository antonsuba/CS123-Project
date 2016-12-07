<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LocationController extends Controller
{
    //
	public function saveLocation($locationData){
		$data = explode(",", $locationData); 
        $name = $data[0];
		$lat = $data[1];
		$lng = $data[2];

        $location = new Location;
		$location->name = $name;
		$location->lat = $lat;
		$location->lng = $lng;
        $location->save();
		
        return response()->json("Location Saved");
    }
}
