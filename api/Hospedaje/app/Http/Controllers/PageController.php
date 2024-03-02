<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lodging;
use App\Models\Location;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
class PageController extends Controller
{
  
   
    public function index(){
        
        $lodgings = Lodging::all();

        return view('page', compact('lodgings'));
    }

    public function show($id){
        $lodging = Lodging::where('id', '=', $id)->first(); 

        return view('show', compact('lodging'));
    }

    public function crear(){
        $user = Auth::user();
        return view('create',compact('user'));
    }
    public function create(Request $request)
    {
       
        $user = Auth::user();

        $country = Country::where('name', $request->input('country_name'))->first();

        // Si el país no existe, puedes crearlo aquí o manejarlo según tu lógica
        if (!$country) {
            $country = Country::create([
                'name' => $request->input('country_name'),
            ]);
        }
    
        // Crear la ubicación (Location) con el país encontrado o creado
        $location = Location::create([
            "postal" => $request->input("postal"),
            "streep" => $request->input("streep"),
            "country_id" => $country->id,
        ]);
    
        $lodging = Lodging::create([
            "name" => $request->input("name"),
            "description" => $request->input("description"),
            "image" => $request->input("image"),
            "backroom" => $request->input("backroom"),
            "location_id" => $location->id,
            "city_name" => $request->input("city_name"),
            "page" => $request->input("page"),
            "user_id"=>$user->id,
            "start_range" => $request->input("start_range"),
            "end_range" => $request->input("end_range"),
          
        ]);

        $lodging->save();
   
        
        return redirect('/page')->with('success', 'Publicacion creado exitosamente');   
    }

    public function editar(){
        $user = Auth::user();
        return view('update', compact('user'));
    }

    public function update(Request $request,Lodging $lodging, $id){
    
        $user = Auth::user();
        if ($user->id !== $lodging->user_id) {
            return redirect()->route('/')->with('error', 'No tienes permisos para editar esta publicación.');
        }
        
        $country = Country::where('name', $request->input('country_name'))->first();

        // Si el país no existe, puedes crearlo aquí o manejarlo según tu lógica
        if (!$country) {
            $country = Country::findOrFail($id)([
                'name' => $request->input('country_name'),
            ]);
        }
    
        // Crear la ubicación (Location) con el país encontrado o creado
        $location = Location::where($id)([
            "streep" => $request->input("streep"),
            "country_id" => $country->id,
        ]);
    
        $lodging = Lodging::where($id)([
            "name" => $request->input("name"),
            "description" => $request->input("description"),
            "image" => $request->input("image"),
            "backroom" => $request->input("backroom"),
            "location_id" => $location->id,
            "city_name" => $request->input("city_name"),
            "page" => $request->input("page"),
            "user_id"=>$user->id,
            "start_range" => $request->input("start_range"),
            "end_range" => $request->input("end_range"),
          
        ]);

        $lodging -> save();
        
        return redirect('/page')->with('success', 'Publicacion editada exitosamente');
    }
}
