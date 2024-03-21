<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ofert;
use Illuminate\Http\Request;

class OfertController extends Controller
{
    public function list(){
        $oferts = Ofert::all();
        
        $list = [];
        foreach ($oferts as $ofert) {
            $object = [
                "id" => $ofert->id,
                "name" => $ofert->name,
                "price" => $ofert->price,
                "created_at" => $ofert->created_at,
                "updated_at" => $ofert->updated_at,
            ];
            array_push($list, $object);
        }

        return response()->json($list);
    }
    public function show($id){
        $ofert = Ofert::where('id', '=', $id)->first(); 
        
        
        $object = [
            "id" => $ofert->id,
            "name" => $ofert->name,
            "price" => $ofert->price,
            "created_at" => $ofert->created_at,
            "updated_at" => $ofert->updated_at,
        ];
        
            return response()->json($object);
        }
    public function create(Request $request){
            
            $data = $request->validate([
                "name"=> "min:3",
                "price"=> "max:2",
            ]);
            $oferts = Ofert::create([
                "name" => $data["name"],
                "price"=> $data["price"],
            ]);
            if($oferts){
                $object = [
                    "response" => "Success. Items is correct",
                    "date"  => $oferts
                ];
                return response()->json($oferts);
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
                "name"=> "min:3|max:20",
                "price"=> "max:2",
                
            ]);

            $element = Ofert::where('id', '=', $data['id'])->first();
            $element->name = $data['name'];
            $element->price = $data['price'];
            
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
    $element = Ofert::where('id', '=', $data['id'])->update([
        "name" => $data["name"],
        "price"=> $data["price"],
        "image" => "file|image
    ]);
    */