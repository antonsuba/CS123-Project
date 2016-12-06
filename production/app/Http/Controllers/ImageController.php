<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Place;
use App\Suggestion;

class ImageController extends Controller
{
    public function uploadImage(){
        if(isset($_POST['image']['type'])){
            $imageName = $_FILES['image']['name'];
            $imageSize = $_FILES['image']['size'];
            $imageTmp = $_FILES['image']['tmp_name'];
            $imgExt = $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));

            $validExtensions = array('jpg', 'jpeg', 'png');
            $errors = array();

            if(!in_array($imgExt, $validExtensions)){
                $errors[] = "Image extension is invalid";
            }

            if($imageSize > 5000000){
                $errors[] = "Image size is too large";
            }

            $destinationPath = "app/resources/images/";
        }
    }
    
}
