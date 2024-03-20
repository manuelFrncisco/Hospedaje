<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Lodging;

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
                "lodging_id" => $reservation->lodging_id,
                "start_date" => $reservation->start_date,
                "end_date" => $reservation->end_date,
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

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function create(Request $request)
    {

        if (auth()->check()) {
            $user_id = auth()->id();

          
        } else {
            // El usuario no está autenticado, manejar el caso en consecuencia
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $data = $request->validate([
            'lodging_id' => 'required|exists:lodgings,id',
            'start_date' => 'date',
            'end_date' => 'date',
        ]);

        $lodging = Lodging::findOrFail($data['lodging_id']);
        $reservations = Reservation::where('lodging_id', $lodging->id)
            ->where(function ($query) use ($data) {
                $query->whereBetween('start_date', [$data['start_date'], $data['end_date']])
                    ->orWhereBetween('end_date', [$data['start_date'], $data['end_date']]);
            })
            ->get();

        if ($reservations->isNotEmpty()) {
            return response()->json(['error' => 'El lodging no está disponible para las fechas seleccionadas'], 400);
        }

        $reservation = new Reservation();
        $reservation->start_date = $data['start_date'];
        $reservation->end_date = $data['end_date'];
        $reservation->user_id = $user_id;
        $reservation->lodging_id = $data['lodging_id'];
        $reservation->save();

        return response()->json(['success' => 'Reserva realizada correctamente'], 200);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            "id" => "required|integer|min:1",
            "user_id" => "max:2",
            "location_id" => "min:3|max:20",
            "rating_id" => "min:3|max:20",
            "date" => "min:3|max:20",
        ]);

        $element = Reservation::where('id', '=', $data['id'])->first();
        $element->user_id = $data['user_id'];
        $element->location_id = $data['location_id'];
        $element->location_id = $data['location_id'];
        $element->rating_id = $data['rating_id'];

        if ($element->update) {
            $object = [
                "response" => "Success. Items is correct",
                "date" => $element
            ];
            return response()->json($element);
        } else {
            $object = [
                "response" => "Error: Something went wrong, please try again."
            ];
        }
        return response()->json($object);
    }
}
