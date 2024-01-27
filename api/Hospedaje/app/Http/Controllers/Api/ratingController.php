<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;

class ratingController extends Controller
{
    public function list()
    {
        $ratings = Rating::all();
        
        $list = [];
        foreach ($ratings as $rating) {
            $object = [
                "id" => $rating->id,
                "number" => $rating->number,
                "user_id" => $rating->user_id,
                "created_at" => $rating->created_at,
                "updated_at" => $rating->updated_at,
            ];
            array_push($list, $object);
        }

        return response()->json($list);
    }
    public function show($id)
    {
        $rating = Rating::where('id', '=', $id)->first(); 
        
        
        $object = [
            "id" => $rating->id,
            "number" => $rating->number,
            "user_id" => $rating->user_id,
            "created_at" => $rating->created_at,
            "updated_at" => $rating->updated_at,
        ];
        
            return response()->json($object);
        }
}
