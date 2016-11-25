<?php

namespace App\Http\Controllers;

use App\Preference;
use App\AvailPref;
use Illuminate\Http\Request;

use App\Http\Requests;

class PreferenceController extends Controller
{
    /**
    *Handling Preferences
    */

    public function addPreferences($preferenceIDs){
        foreach ($preferenceIDs as $preferenceID) {
            $pref = Preference::find($preferenceID);
            
            $newAP = new AvailPref;
            $newAP->user_id = Auth::id();
            $newAP->preference_id = $preferenceID;
            $newAP->save();
        }
    }

    public function removePreferences($preferenceIDs){
        foreach($preferenceIDs as $preferenceID){
            $pref = AvailPref::find($preferenceID);
            $pref->delete();
        }
    }

    public function showPreferences(){
        $userPreferences = AvailPref::where('user_id', Auth::id())->get();

        foreach($userPreferences as $preference){
            $prefID = $preference->preference_id;
            $pref = Preference::find($prefID);
        }
    }
}
