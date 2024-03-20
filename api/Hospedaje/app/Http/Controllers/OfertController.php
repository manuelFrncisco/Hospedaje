<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ofert;
class OfertController extends Controller
{
    public function index(){
        $oferts = Ofert::all();

        return view("admin.oferts.index", compact('oferts'));
    }
}
