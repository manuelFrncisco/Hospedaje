<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Country;

class LocationController extends Controller
{
    public function index()
    {

        $locations = Location::all();

        return view("admin.locations.index", compact('locations'));
    }

    public function localizacionCrear(Request $request)
    {
        $countries = Country::all();
        return view('admin.locations.create', compact('countries'));
    }

    public function localizacionEditar($id)
    {
        $location = Location::findOrFail($id);
        $countries = Country::all();

        return view('admin.locations.edit', compact('location', 'countries'));
    }

    public function LocationCreate(Request $request)
    {
        $request->validate([
            'streep' => 'required|string',
            'country_id' => 'required|exists:countries,id',
            'postal' => 'required|string',
        ]);
        $location = new Location();
        $location->streep = $request->input('streep');
        $location->country_id = $request->input('country_id');
        $location->postal = $request->input('postal');
        $location->save();

        return redirect()->route('admin.locations.index');
    }

    public function LocationEdit(Request $request, $id)
    {
        $request->validate([
            'streep' => 'required|string',
            'country_id' => 'required|exists:countries,id',
            'postal' => 'required|string',
        ]);
        $location = Location::findOrFail($id);
        $location->streep = $request->input('streep');
        $location->country_id = $request->input('country_id');
        $location->postal = $request->input('postal');
        $location->save();

        return redirect()->route('admin.locations.index');
    }

    public function LocationDelete($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        return redirect()->route('admin.locations.index');
    }
}
