<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Location;

class ExperienceController extends Controller
{
    public function index(){
        $locations = $this->getLocations();
        return view('createanexperience', ['locations' => $locations]);
    }

    public function getLocations(){
        $locations = Location::get(['id', 'name']);
        return $locations;
    }
}
