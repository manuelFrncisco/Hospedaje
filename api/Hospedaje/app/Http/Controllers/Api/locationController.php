<?php

namespace App\Http\Controllers\api;

use App\Models\Location;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    public function list(){
        $locations = Location::all();

        $list = [];
        foreach ($locations as $location) {
            $object = [
                "id" => $location->id,
                "streep" => $location->streep,
                "city" => $location->city,
                "country" => $location->country,
                "postal" => $location->postal,
                "created_at" => $location->created_at,
                "updated_at" => $location->updated_at,
            ];
            array_push($list, $object);
        }

        return response()->json($list);
    }
    public function show($id){
        $location = Location::where('id', '=', $id)->first();


        $object = [
            "id" => $location->$id,
            "streep" => $location->streep,
            "city" => $location->city,
            "country" => $location->country,
            "postal" => $location->postal,
            "crated_at" => $location->created_at,
            "updated_at" => $location->updated_at,
        ];

        return response()->json($object);
    }
    public function create(Request $request){
            
        $data = $request->validate([
            "streep"=> "min:3",
            "city"=> "max:2",
            "country"=> "max:2",
            "postal"=> "max:5",
        ]);
        $locations = Location::create([
            "streep" => $data["streep"],
            "city"=> $data["city"],
            "country"=> $data["country"],
            "postal"=> $data["postal"]
        ]);
        if($locations){
            $object = [
                "response" => "Success. Items is correct",
                "date"  => $locations
            ];
            return response()->json($locations);
        }else{
            $object = [
                "response" => "Error: Something went wrong, please try again."
            ];
        }
        return response()->json($object);
    }
    public function update(Request $request){
        $data = $request->validate([
            "id"=> "required|integer|min:1",
            "streep"=> "max:2",
            "city"=> "min:3|max:20",
            "country"=> "min:3|max:20",
            "postal"=> "min:3|max:20",
            
        ]);

        $element = Location::where('id', '=', $data['id'])->first();
        $element->streep = $data['streep'];
        $element->city = $data['city'];
        $element->country = $data['country'];
        $element->postal = $data['postal'];
        
        if($element->update){
            $object = [
                "response" => "Success. Items is correct",
                "date"  => $element
            ];
            return response()->json($element);
        }else{
            $object = [
                "response" => "Error: Something went wrong, please try again."
            ];
        }
        return response()->json($object);
    }
}

/*
return Location::all();
*/
/*
$location = Location::find($id);
return $location;        
*/