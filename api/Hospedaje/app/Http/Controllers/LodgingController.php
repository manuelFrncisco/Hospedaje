<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LodgingController extends Controller
{
    public function index(){
        return view("admin.lodgings.index");
    }
}
