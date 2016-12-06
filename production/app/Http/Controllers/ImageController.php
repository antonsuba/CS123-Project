<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Place;
use App\Suggestion;

class ImageController extends Controller
{
    public function uploadImage(){
        if(isset($_POST['image'])){
            //$imageName = $_FILES['image']['name'];
            $imageSize = $_FILES['image']['size'];
            $imageTmp = $_FILES['image']['tmp_name'];
            $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));

            $validExtensions = array('jpg', 'jpeg', 'png');
            $errors = array();

            if(!in_array($imgExt, $validExtensions)){
                $errors[] = "Image extension is invalid";
            }

            if($imageSize > 5000000){
                $errors[] = "Image size is too large";
            }

            $destinationPath = "/resources/images/";

            $imageCount = count(Image::all());
            $imageName = $imageCount + 1;            
            
            $image = new Image;
            $image->name = $imageName;
            $image->save();
            
            /*if($referenceTable === 'suggestion'){
                $suggestion = Suggestion::find($referenceID);

                $imageName = $suggestion->name.".".$imgExt;
            } else if($referenceTable === 'place'){
                $place = Place::find($referenceID);

                $imageName = $place->name.".".$imgExt;
            }*/
            return response()->json("Image uploaded");

            if(empty($errors)){
                move_uploaded_file($imageTmp, $destinationPath.$imageName);
                return response()->json("Image uploaded");
                print "image uploaded";
            } else{
                return response()->json($errors);
                print $errors;
            }
        } else{
            return response()->json("fuck u");
        }
    }
    
}
