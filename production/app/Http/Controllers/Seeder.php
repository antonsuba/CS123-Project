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
            $model = new Category;
            $model->name = $category['name'];

            $model->save();
        }

        echo 'Category population successful';
    }

    public function populatePreferences(){
        $preferences = array(
            ['name' => 'Degustation', 'category_id' => '1'],
            ['name' => 'Italian', 'category_id' => '2'],
            ['name' => 'Mexican', 'category_id' => '2'],
            ['name' => 'Comedy Bar', 'category_id' => '3'],
            ['name' => 'Speakeasy', 'category_id' => '3'],
            ['name' => 'Football', 'category_id' => '4'],
            ['name' => 'Archery', 'category_id' => '4'],
            ['name' => 'Painting', 'category_id' => '5'],
            ['name' => 'Sculpting', 'category_id' => '5']
        );

        foreach($preferences as $preference){
            $model = new Preference;
            $model->name = $preference['name'];
            $model->category_id = $preference['category_id'];

            $model->save();
        }

        echo 'Preference population successful';
    }

    public function populateSuggestions(){
        $suggestions = array(
            
        );
    }
}
