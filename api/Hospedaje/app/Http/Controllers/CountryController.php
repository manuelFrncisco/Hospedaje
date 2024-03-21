<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('admin.countries.index', compact('countries'));
    }

    public function paisCrear()
    { 
        return view('admin.countries.create');

    }
    public function paisEditar($id)
    {
        $country = Country::findOrFail($id);

        return view('admin.countries.edit', compact('country'));
    }
    public function CountryCreate(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
    
        $country = new Country();
        $country->name = $request->input('name');
        $country->save();

        return redirect()->route('admin.countries.index');
        
    }
    public function CountryEdit(Request $request, $id)
    {
        
    $request->validate([
        'name' => 'required|string',
    ]);

    $country = Country::findOrFail($id);
    $country->name = $request->input('name');
    $country->save();

    return redirect()->route('admin.countries.index');

    }

}
