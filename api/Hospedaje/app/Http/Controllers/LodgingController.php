<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lodging;
class LodgingController extends Controller
{
    public function index(){
        $lodgings = Lodging::all();

        return view("admin.lodgings.index", compact('lodgings'));
    }
}
