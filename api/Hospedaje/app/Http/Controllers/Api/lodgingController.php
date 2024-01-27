<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lodging;
use Illuminate\Http\Request;

class lodgingController extends Controller
{
    public function list()
    {
        $lodgings = Lodging::all();
        
        $list = [];
        foreach ($lodgings as $lodging) {
            $object = [
                "id" => $lodging->id,
                "name" => $lodging->name,
                "description" => $lodging->description,
                "image" => $lodging->image,
                "backroom" => $lodging->backroom,
                "ofert_id" => $lodging->ofert_id,
                "location_id" => $lodging->location_id,
                "created_at" => $lodging->cerated_at,
                "updated_at" => $lodging->updated_at,
            ];
            array_push($list, $object);
        }

        return response()->json($list);
    }
    public function show($id)
    {
        $lodging = Lodging::where('id', '=', $id)->first(); 
        
        
        $object = [
            "id" => $lodging->id,
            "name" => $lodging->name,
            "description" => $lodging->description,
            "image" => $lodging->image,
            "backroom" => $lodging->backroom,
            "ofert_id" => $lodging->ofert_id,
            "location_id" => $lodging->location_id,
            "created_at" => $lodging->cerated_at,
            "updated_at" => $lodging->updated_at,
            ];
        
            return response()->json($object);
        }
}
