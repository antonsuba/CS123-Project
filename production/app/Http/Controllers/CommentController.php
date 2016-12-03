<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CommentController extends Controller
{
    //This shall be used to get all them comments for a specific suggestion
	public function getComments($suggestionID){
		$comments = Comment::find($suggestionID);
	}
	
	public function giveComment($suggestionID){
		
	}
}
