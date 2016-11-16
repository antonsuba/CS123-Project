<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;
use App\Preference;
use App\Suggestion;
use App\Preference_Suggestion;
use App\AvailPref;

class Seeder extends Controller
{
    public function seedAll(){
        $this->populateCategories();
        $this->populatePreferences();
        $this->populateSuggestions();
        $this->populatePrefSuggestions();
        $this->populateAvailPrefs();
    }

    public function populateCategories(){
        $categories = array(
            ['name' => 'Fine Dining'],
            ['name' => 'Casual Dining'],
            ['name' => 'Late Night'],
            ['name' => 'Sports'],
            ['name' => 'Arts']
        );

        foreach($categories as $category){
            $check = Category::where('name', '=', $category['name'])->first();

            if($check === null){
                $model = new Category;
                $model->name = $category['name'];

                $model->save();
            }
        }

        echo 'Category population successful';
    }

    public function populatePreferences(){
        $preferences = array(
            ['name' => 'Degustation', 'category_id' => '1'],
            ['name' => 'Italian', 'category_id' => '2'],
            ['name' => 'Mexican', 'category_id' => '2'],
            ['name' => 'Rooftop Bar', 'category_id' => '3'],
            ['name' => 'Speakeasy', 'category_id' => '3'],
            ['name' => 'Football', 'category_id' => '4'],
            ['name' => 'Archery', 'category_id' => '4'],
            ['name' => 'Painting', 'category_id' => '5'],
            ['name' => 'Sculpting', 'category_id' => '5']
        );

        foreach($preferences as $preference){
            $check = Preference::where('name', '=', $preference['name'])->first();

            if($check === null){
                $model = new Preference;
                $model->name = $preference['name'];
                $model->category_id = $preference['category_id'];

                $model->save();
            }
        }

        echo 'Preference population successful';
    }

    public function populateSuggestions(){
        $suggestions = array(
            ['name' => 'Sip ang Gogh', 'rating' => 5, 'location' => 'Eastwood', 'popularity' => 22, 'weight' => 0.7],
            ['name' => 'The Bunk', 'rating' => 3, 'location' => 'Shaw Blvd', 'popularity' => 43, 'weight' => 0.33],
            ['name' => 'Prohibition', 'rating' => 4, 'location'=> 'Greenbelt 5, Makati', 'popularity' => 72, 'weight' => 0.2]
        );

        foreach($suggestions as $suggestion){
            $check = Suggestion::where('name', '=', $suggestion['name'])->first();

            if($check === null){
                $model = new Suggestion;
                $model->name = $suggestion['name'];
                $model->rating = $suggestion['rating'];
                $model->location = $suggestion['location'];
                $model->popularity = $suggestion['popularity'];
                $model->weight = $suggestion['weight'];

                $model->save();
            }
        }

        echo 'Suggestion population successful';
    }

    public function populatePrefSuggestions(){
        $prefSuggestions = array(
            ['preference_id' => 8, 'suggestion_id' => 1],
            ['preference_id' => 4, 'suggestion_id' => 3],
            ['preference_id' => 5, 'suggestion_id' => 2]
        );

        foreach($prefSuggestions as $prefSuggestion){
            $model = new Preference_Suggestion;
            $model->preference_id = $prefSuggestion['preference_id'];
            $model->suggestion_id = $prefSuggestion['suggestion_id'];

            $model->save();
        }

        echo 'PrefSuggestions population successful';
    }

    public function populateAvailPrefs(){
        $availprefs = array(
            ['user_id' => 1, 'preference_id' => 4, 'recency_score' => 8.4]
        );

        foreach($availprefs as $availpref){
            $model = new AvailPref;
            $model->user_id = $availpref['user_id'];
            $model->preference_id = $availpref['preference_id'];
            $model->recency_score = $availpref['recency_score'];

            $model->save();
        }

        echo 'AvialPrefs population successfull';
    }
}
