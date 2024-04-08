<?php

namespace App\Http\Controllers;

use App\Models\Lodging;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::all();

        return view("admin.ratings.index", compact('ratings'));
    }

    public function ratingShow($id)
    {
        $rating = Rating::findOrFail($id);
        return view("admin.ratings.show", compact('rating'));
    }

    public function calificacionCrear()
    {
        $reservations = Reservation::all();
        $lodgings = Lodging::all();
        return view('admin.ratings.create', compact('lodgings', 'reservations'));
    }

    public function RatingCreate(Request $request)
    {
        $request->validate([
            'number' => 'required|integer|min:1|max:5',
            'user_id' => 'required|exists:users,id',
            'lodging_id' => 'required|exists:lodgings,id',
            'reservation_id' => 'nullable|exists:reservations,id',
        ]);
    
        $rating = new Rating();
        $rating->number = $request->input('number');
        $rating->user_id = $request->input('user_id');
        $rating->lodging_id = $request->input('lodging_id');
        $rating->reservation_id = $request->input('reservation_id');
        $rating->save();

        return redirect()->route('admin.ratings.index');
        
    }

    public function calificacionEditar($id)
    {   
        $rating = Rating::findOrFail($id);
        $lodgings = Lodging::all();
        $reservations = Reservation::all();
        return view('admin.ratings.edit', compact('rating', 'lodgings', 'reservations'));
    }

    public function RatingEdit(Request $request,$id)
    {
        $request->validate([
            'number' => 'required|integer|min:1|max:5',
            'reservation_id' => 'nullable|exists:reservations,id',
        ]);
    
        $rating = Rating::findOrFail($id);
        $rating->number = $request->input('number');
        $rating->reservation_id = $request->input('reservation_id');
        $rating->save();

        return redirect()->route('admin.ratings.index');
    }
    public function RatingDelete($id)
    {
        $rating = Rating::findOrFail($id);
        $rating->delete();

        return redirect()->route("admin.ratings.index");
    }
}

