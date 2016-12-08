<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Location;
use App\Preference;

class ExperienceController extends Controller
{
    public function index(){
        $locations = $this->getLocations();
        $preferences = $this->getPreferences();

        $data = array('preferences' => $preferences, 'locations' => $locations);
        return view('createanexperience')->with($data);
    }

    public function getLocations(){
        $locations = Location::get(['id', 'name']);
        return $locations;
    }

    public function getPreferences(){
        $preferences = Preference::get(['id', 'name']); 
        return $preferences;
    }
}
