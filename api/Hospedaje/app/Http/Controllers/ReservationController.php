<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Lodging;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();

        return view("admin.reservations.index", ['reservations' => $reservations]);
    }
    

    public function ReservationShow($id)
    {
        $reservation = Reservation::findOrFail($id);
        
        return view('admin.reservations.show', compact('reservation'));
    }

    public function reservacionCrear()
    {
        $lodgings = Lodging::all();

        return view("admin.reservations.create", compact('lodgings'));
    }



    public function reservarEditar(Request $request, $id)
    {
        $data = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->start_date = $data['start_date'];
        $reservation->end_date = $data['end_date'];
        $reservation->save();

        return redirect()->route('admin.reservations.index')->with('success', 'Reserva actualizada correctamente');
    }


    public function ReservationEdit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('admin.reservations.edit', compact('reservation'));
    }

    public function ReservationDelete($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation ->delete();

        return redirect()->route('admin.reservations.index');
    }

}
