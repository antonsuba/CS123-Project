<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CommentController extends Controller
{
    //This shall be used to get all them comments for a specific suggestion
	public function getComments($suggestionID){
		$comments = Comment::where('suggestion_id',$suggestionID)->get();
		foreach($comments as $comment){ // as of now, only echos its content, possible others to echo: time updates/created, user
			echo $comment->content;
		}
	}
	
	public function giveComment($suggestionID,$content,$userID){
		$newComment = new Comment;
		$newComment->suggestion_id = $suggestionID;
		$newComment->user_id = $userID;
		$newComment->content = $content;
		$newComment->created_at = date("Y-m-d H:i:s"); // Get immediate date and time
		$newComment->save();
	}
}
