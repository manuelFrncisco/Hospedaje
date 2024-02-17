<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    public function list(){
        $packages = Package::all();

        $list = [];
        foreach ($packages as $package) {
            $object = [
                "id" => $package->id,
                "start_range" => $package->start_range,
                "end_range" => $package->end_range,
                "page" => $package->page,
                "lodging_id" => $package->lodging_id,
                "created_at" => $package->created_at,
                "updated_at" => $package->updated_at,
            ];
            array_push($list, $object);
        }

        return response()->json($list);
    }
    public function show($id){
        $package = Package::where('id', '=', $id)->first();


        $object = [
            "id" => $package->$id,
            "start_range" => $package->start_range,
            "end_range" => $package->end_range,
            "page" => $package->page,
            "lodging_id" => $package->lodging_id,
            "crated_at" => $package->created_at,
            "updated_at" => $package->updated_at,
        ];

        return response()->json($object);
    }
    public function create(Request $request){
            
        $data = $request->validate([
            "start_range"=> "min:225",
            "end_range"=> "max:225",
            "page"=> "max:225",
            "lodging_id"=> "max:20"
        ]);
        $package = Package::create([
            "start_range" => $data["start_range"],
            "end_range"=> $data["end_range"],
            "page"=> $data["page"],
            "lodging_id"=> $data["lodging_id"]
        ]);
        if($package){
            $object = [
                "response" => "Success. Items is correct",
                "date"  => $package
            ];
            return response()->json($package);
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
            "start_range"=> "date",
            "end_range"=> "date",
            "page"=> "min:3|max:10",
            "lodging_id"=> "required|integer|min:1",
            
        ]);

        $element = Package::where('id', '=', $data['id'])->first();
        $element->start_range = $data['start_range'];
        $element->end_range = $data['end_range'];
        $element->page = $data['page'];
        $element->lodging_id = $data['lodging_id'];
        
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
