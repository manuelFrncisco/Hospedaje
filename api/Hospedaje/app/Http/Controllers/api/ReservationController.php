<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Lodging;

class ReservationController extends Controller
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
        // Verificar si el usuario está autenticado
        if (auth()->check()) {
            $user_id = auth()->id();

            // Validar los datos de la reserva
            $data = $request->validate([
                'lodging_id' => 'required|exists:lodgings,id',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
            ]);

            // Verificar si el usuario ya tiene una reserva para el mismo lodging
            $existingReservation = Reservation::where('user_id', $user_id)
                ->where('lodging_id', $data['lodging_id'])
                ->first();

            if ($existingReservation) {
                return response()->json(['error' => 'Ya tienes una reserva para este lodging'], 400);
            }

            // Crear la nueva reserva
            $reservation = new Reservation();
            $reservation->start_date = $data['start_date'];
            $reservation->end_date = $data['end_date'];
            $reservation->user_id = $user_id;
            $reservation->lodging_id = $data['lodging_id'];
            $reservation->save();

            return response()->json(['success' => 'Reserva realizada correctamente'], 200);
        } else {
            // El usuario no está autenticado, manejar el caso en consecuencia
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }



    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->start_date = $data['start_date'];
        $reservation->end_date = $data['end_date'];
        $reservation->save();

        return redirect()->route('reservations.index')->with('success', 'Reserva actualizada correctamente');
    }

    public function delete($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return back()->with('success', 'Reservaacion eliminada exitosamente');
    }

}
