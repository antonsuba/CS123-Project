<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LocationController extends Controller
{
    //
	public function saveLocation(Request $request){
		$name= $request->name;
		$lat = $request->lat;
		$lng = $request->lng;
		$requestArray = array($name,$lat,$lng);
		$jsonData = json_encode($requestArray);
		echo $jsonData;

        $location = new Location;
		$location->name = $name;
		$location->lat = $lat;
		$location->lng = $lng;
        $location->save();
		
        return response()->json("Location Saved");
    }
}
