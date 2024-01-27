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
}
