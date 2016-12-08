<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Suggestion;
use App\Bookmark;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    /**
    *Handling Bookmarks
    */
    public function index(){
        return view('bookmarks');
    }

    public function getBookmarks(){
        $currentUser = Auth::user();
        $bookmarks = $currentUser->bookmarks()->get();

        return $bookmarks;
    }

    public function saveBookmark(Request $request){
        $inputs = $request->input();
        $suggestionID = $inputs['suggestionID'];

        $suggestion = Suggestion::find($suggestionID);
        $sug_id = $suggestion->id;
        $bookmark = new Bookmark;
        $bookmark->user_id = Auth::id();
        //$bookmark->category_id = $cat_id;
        $bookmark->save();

        return response()->json("Bookmarked");
    }

    public function removeBookmark($bookmarkID){
        $bookmark = Bookmark::find($bookmarkID);
        $bookmark->delete();
    }

    public function showBookmarks(){
        $userBookmarks = Bookmark::where('user_id', Auth::id())->get();

        return $userBookmarks;
    }
}
