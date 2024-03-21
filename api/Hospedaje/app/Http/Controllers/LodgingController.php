<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lodging;
use App\Models\Location;
class LodgingController extends Controller
{
    public function index(){
        $lodgings = Lodging::all();

        return view("admin.lodgings.index", compact('lodgings'));
    }

    public function alojamientoCrear()
    {
        $locations = Location::all();
        return view('admin.lodgings.create', compact('locations'));
    }
    
    public function alojamientoEditar()
    {

    }

    public function LodgingCreate(Request $request)
    {

    }

    public function LodgingEdit(Request $request, $id)
    {

    }



    public function LodgingDelete($id)
    {
        $lodging = Lodging::findOrFail($id);
        $lodging->delete();

        return redirect()->route('admin.lodgings.index');
    }
}
