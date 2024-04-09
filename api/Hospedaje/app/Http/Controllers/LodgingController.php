<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lodging;
use App\Models\Location;

class LodgingController extends Controller
{
    public function index()
    {
        $lodgings = Lodging::all();

        return view("admin.lodgings.index", compact('lodgings'));
    }

    public function lodgingShow($id)
    {
        $lodging = Lodging::findOrFail($id);

        return view('admin.lodgings.show', compact('lodging'));
    }

    public function alojamientoCrear()
    {
        $locations = Location::all();
        return view('admin.lodgings.create', compact('locations'));
    }

    public function lodgingCrear()
    {
        return view('admin.logdgings.create');
    }

    public function alojamientoEditar($id)
    {
        $lodging = Lodging::findOrFail($id);
        $locations = Location::all();
        return view('admin.lodgings.edit', compact('lodging', 'locations'));
    }

    public function LodgingCreate(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|string',
            'backroom' => 'required|string',
            'location_id' => 'required|exists:locations,id',
            'page' => 'required|integer',
            'start_range' => 'required|date',
            'end_range' => 'required|date',
            'user_id' => 'required'

        ]);

        $lodging = new Lodging();
        $lodging->name = $request->input('name');
        $lodging->description = $request->input('description');
        $lodging->image = $request->input('image');
        $lodging->backroom = $request->input('backroom');
        $lodging->location_id = $request->input('location_id');
        $lodging->page = $request->input('page');
        $lodging->start_range = $request->input('start_range');
        $lodging->end_range = $request->input('end_range');
        $lodging->user_id = auth()->id();
        $lodging->save();

        return redirect()->route('admin.lodgings.index');


    }

    public function LodgingEdit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|string',
            'backroom' => 'required|string',
            'location_id' => 'required|exists:locations,id',
            'page' => 'required|integer',
            'start_range' => 'required|date',
            'end_range' => 'required|date',
            'user_id' => 'required'
        ]);

        $lodging = Lodging::findOrFail($id);
        $lodging->name = $request->input('name');
        $lodging->description = $request->input('description');
        $lodging->image = $request->input('image');
        $lodging->backroom = $request->input('backroom');
        $lodging->location_id = $request->input('location_id');
        $lodging->page = $request->input('page');
        $lodging->start_range = $request->input('start_range');
        $lodging->end_range = $request->input('end_range');
        $lodging->user_id = auth()->id();
        $lodging->save();

        return redirect()->route('admin.lodgings.index');
    }



    public function LodgingDelete($id)
    {
        $lodging = Lodging::findOrFail($id);
        $lodging->delete();

        return redirect()->route('admin.lodgings.index');
    }
}
