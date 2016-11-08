<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RecommendationEngine extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
