<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class reservationController extends Controller
{
    public function list()
    {
        $reservations = Reservation::all();
        
        $list = [];
        foreach ($reservations as $reservation) {
            $object = [
                "id" => $reservation->id,
                "user_id" => $reservation->user_id,
                "location_id" => $reservation->location_id,
                "lodging_id" => $reservation->lodging_id,
                "rating_id" => $reservation->rating_id,
                "date" => $reservation->date,
                "created_at" => $reservation->created_at,
                "updated_at" => $reservation->updated_at,
            ];
            array_push($list, $object);
        }

        return response()->json($list);
    }
    public function show($id)
    {
        $reservation = Reservation::where('id', '=', $id)->first(); 
        
        
        $object = [
            "id" => $reservation->id,
            "user_id" => $reservation->user_id,
            "location_id" => $reservation->location_id,
            "lodging_id" => $reservation->lodging_id,
            "rating_id" => $reservation->rating_id,
            "date" => $reservation->date,
            "created_at" => $reservation->created_at,
            "updated_at" => $reservation->updated_at,
        ];
        
            return response()->json($object);
        }
        public function create(Request $request){
            
            $data = $request->validate([
                "user_id"=> "min:3",
                "location_id"=> "max:2",
                "lodging_id"=> "max:2",
                "rating_id"=> "max:2",
                "date"=> "max:15",
            ]);
            $reservations = Reservation::create([
                "user_id" => $data["user_id"],
                "location_id"=> $data["location_id"],
                "lodging_id"=> $data["lodging_id"],
                "rating_id"=> $data["rating_id"],
                "date"=> $data["date"],
            ]);
            if($reservations){
                $object = [
                    "response" => "Success. Items is correct",
                    "date"  => $reservations
                ];
                return response()->json($reservations);
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
                "user_id"=> "max:2",
                "location_id"=> "min:3|max:20",
                "rating_id"=> "min:3|max:20",
                "date"=> "min:3|max:20",
            ]);

            $element = Reservation::where('id', '=', $data['id'])->first();
            $element->user_id = $data['user_id'];
            $element->location_id = $data['location_id'];
            $element->location_id = $data['location_id'];
            $element->rating_id = $data['rating_id'];
            
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
