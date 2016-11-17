<?php

namespace App\Http\Controllers;

use App\Preference;
use App\AvailPref;
use Illuminate\Http\Request;

use App\Http\Requests;

class PreferenceController extends Controller
{
    /**
    *Back-end for handling Preferences
    */
    public function addPreferences($preferences){
        foreach ($preferences as $preference) {
            $pref = Preference::where('name', $preference);
            $pref_id = $pref->id;
            
            $newAP = new AvailPref;
            $newAP->user_id = Auth::id();
            $newAP->preference_id = $pref_id;
            $newAP->save();
        }
    }

    public function removePreferences($preferences){
        foreach($preferences as $preference){
            $pref = AvailPref::where('name', $preference);
            $pref->delete();
        }
    }
}
