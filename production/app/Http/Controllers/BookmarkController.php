<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Preference_Suggestion;
use App\Bookmark;

class BookmarkController extends Controller
{
    /**
    *Handling Bookmarks
    */
    public function index(){
        return view('bookmarks');
    }

    public function getBookmarks(){
        
    }

    public function saveBookmark(Request $request){
        $inputs = $request->input();
        $suggestionID = $inputs['suggestionID'];

        // $sug = Preference_Suggestion::where('suggestion_id', $suggestionID);
        // $sug_id = $sug->suggestion_id;

        // $pref = Preference::find($sug->preference_id);
        // $cat_id = $pref->category_id;

        $categoryID = Preference_Suggestion::find();

        // $bookmark = new Bookmark;
        // $bookmark->user_id = Auth::id();
        // $bookmark->category_id = $cat_id;
        // $bookmark->save();

        return response()->json($suggestionID);
    }

    public function removeBookmark($bookmarkID){
        $bookmark = Bookmark::find($bookmarkID);
        $bookmark->delete();
    }

    public function showBookmarks(){
        $userBookmarks = Bookmark::where('user_id', Auth::id())->get();

        foreach($userBookmarks as $bookmark){
            echo $bookmark->name;
        }
    }
}
