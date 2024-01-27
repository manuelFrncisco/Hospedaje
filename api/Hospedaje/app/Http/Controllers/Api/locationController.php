<?php

namespace App\Http\Controllers\Api;

use App\Models\Location;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class locationController extends Controller
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
   
}

/*
return Location::all();
*/
/*
$location = Location::find($id);
return $location;        
*/