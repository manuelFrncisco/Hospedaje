<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lodging;
class PageController extends Controller
{
  
   
    public function index(){
        
        $lodgings = Lodging::all();

        return view('page', compact('lodgings'));
    }
}
