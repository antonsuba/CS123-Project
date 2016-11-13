<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;
use App\Preference;
use App\Suggestion;

class Seeder extends Controller
{
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
            ['name' => 'The Bunk', 'rating' => 3, 'location' => 'Shaw Blvd', 'popularity' => 43, 'weight' => 9],
            ['name' => 'Prohibition', 'rating' => 4, 'location'=> 'Greenbelt 5, Makati', 'popularity' => 72, 'weight' => 5]
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

    }
}
