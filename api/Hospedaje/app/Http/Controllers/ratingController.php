<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
class RatingController extends Controller
{
    public function index(){
        $ratings = Rating::all();

        return view("admin.ratings.index", compact('ratings'));
    }
}
