<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{   
    /**
    *Handling Users
    */

    public function changePassword($oldPass, $newPass, $confirmNewPass){
        $user = Auth::user();
        if($user->password == $oldPass){
            if($newPass == $confirmNewPass){
                User::where('id', Auth::id())->update(['password' => $newPass]);
            } else{
                $error = "New password and confrimation password do not match";
            }
        } else{
            $error = "Old password does not match current password";
        }
    }
}
