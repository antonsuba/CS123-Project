<?php

namespace App\Http\Controllers;

use App\Preference;
use App\ProfilePreference;
use Illuminate\Http\Request;

use App\Http\Requests;

class PreferenceController extends Controller
{
    //preferences back end

    public function submitPreferences(){
        foreach ($preferences as $preference) {
            $pref = Preference::where('name', $preference);
            
            //check if preference already exists
            //if($pref->count() > 0){
                $pref_id = $pref->id;
            //} 
            /*else{
                //create new row for preference table
                $newPref = new Preference;
                $newPref->name = $preference;
                $newPref->save();
                $pref_id = $newPref->id;
            }*/
            
            $newPP = new ProfilePreference;
            $newPP->profile_id = $SESSION["profile_id"];
            $newPP->preference_id = $pref_id;
            $newPP->save();
            //$insertPref = DB::table('profilePreferences')->insert(['profile_id' => $SESSION["profile_id"], 'preference_id' => $pref_id]);
        }
    }
}
