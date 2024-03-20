<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Models\Lodging;
use App\Models\Location;
use App\Models\Country;
use App\Models\Comment;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{


    public function index(Request $request)
    {
        $query = $request->input('query');
        $lodgings = Lodging::query();

        if ($query) {
            $lodgings->where('name', 'LIKE', "%$query%")
                ->orWhereHas('location', function ($q) use ($query) {
                    $q->where('streep', 'LIKE', "%$query%");
                });
        }

        $lodgings = $lodgings->get();

        return view('page', compact('lodgings'));
    }

    public function show($id)
    {
        $lodging = Lodging::findOrFail($id);
        $comments = Comment::where('lodging_id', $lodging->id)->get();
        $reservations = [];
        $averageRating = null;

        if (Auth::check()) {
            $user = Auth::user();
            $reservations = Reservation::where('user_id', $user->id)->get();
            $ratings = Rating::where('lodging_id', $id)->pluck('number');
            $averageRating = $ratings->avg();
        }

        return view('show', compact('lodging', 'comments', 'reservations', 'averageRating'));
    }

    public function crear()
    {
        $user = Auth::user();
        return view('create', compact('user'));
    }
    public function create(Request $request)
    {

        $user = Auth::user();

        $country = Country::where('name', $request->input('country_name'))->first();

        // Si el país no existe, puedes crearlo aquí o manejarlo según tu lógica
        if (!$country) {
            $country = Country::create([
                'name' => $request->input('country_name'),
            ]);
        }

        // Crear la ubicación (Location) con el país encontrado o creado
        $location = Location::create([
            "postal" => $request->input("postal"),
            "streep" => $request->input("streep"),
            "country_id" => $country->id,
        ]);

        $lodging = Lodging::create([
            "name" => $request->input("name"),
            "description" => $request->input("description"),
            "image" => $request->input("image"),
            "backroom" => $request->input("backroom"),
            "location_id" => $location->id,
            "city_name" => $request->input("city_name"),
            "page" => $request->input("page"),
            "user_id" => $user->id,
            "start_range" => $request->input("start_range"),
            "end_range" => $request->input("end_range"),

        ]);

        $lodging->save();


        return redirect('/page')->with('success', 'Publicacion creado exitosamente');
    }

    public function editar($id)
    {
        $lodging = Lodging::findOrFail($id);
        $countries = Country::all();
        return view('update', compact('lodging', 'countries'));
    }

    public function update(Request $request)
    {

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para reservar.');
        }

        $data = $request->validate([
            "id" => "required|integer|min:1",
            "name" => "min:2",
            "description" => "min:3|max:500",
            "image" => "min:3",
            "backroom" => "min:1",
            "ofert_id" => "integer|min:1",
            "page" => "integer|min:2",
            "start_range" => "date",
            "end_range" => "date",
            "user_id" => "integer|min:1",
            "location_id" => "min:3|max:20"
        ]);

        $country = Country::find($request->input('new_country_id'));

        if (array_key_exists('location_id', $data)) {
            $location = Location::findOrFail($data['location_id']);
            $location->streep = $request->input("streep");
            $location->country_id = $country->id;
        }

        if (array_key_exists('id', $data)) {
            $lodging = Lodging::findOrFail($data['id']);
            $lodging->name = $request->input("name");
            $lodging->description = $request->input("description");
            $lodging->image = $request->input("image");
            $lodging->backroom = $request->input("backroom");
            if (isset($location)) {
                $lodging->location_id = $location->id;
                $lodging->country_name = $country->name;
            }
            $lodging->page = $request->input("page");
            $lodging->start_range = $request->input("start_range");
            $lodging->end_range = $request->input("end_range");

            $lodging->save();

            return redirect('/page')->with('success', 'Publicacion editada exitosamente');
        }
        return redirect('/page')->with('error', 'No se pudo editar la publicacion');
    }


    public function reservafrom($id)
    {
        $lodging = Lodging::findOrFail($id);
        return view('reservation', compact('lodging'));
    }

    public function reserve(Request $request)
    {
        // Validar los datos de la solicitud
        $data = $request->validate([
            'lodging_id' => 'required|exists:lodgings,id',
        ]);
    
        // Obtener el lodging seleccionado
        $lodging = Lodging::findOrFail($data['lodging_id']);
    
        // Verificar disponibilidad del lodging
        $reservations = Reservation::where('lodging_id', $lodging->id)
            ->where('end_date', '>=', now()) // Solo se consideran las reservas futuras
            ->get();
    
        if ($reservations->isNotEmpty()) {
            return back()->with('error', 'El lodging no está disponible para las fechas seleccionadas');
        }
    
        // Crear la reserva
        $reservation = new Reservation();
        $reservation->start_date = $lodging->start_range;
        $reservation->end_date = $lodging->end_range;
        $reservation->user_id = auth()->id();
        $reservation->lodging_id = $lodging->id;
        $reservation->save();
    
        return redirect('/page')->with('success', 'Reserva realizada correctamente');
    }
    




    public function destroy($id)
    {
        $lodging = Lodging::findOrFail($id);
        $lodging->delete();

        return redirect('/page')->with('success', 'Publicación eliminada exitosamente');
    }

    public function createComment(Request $request)
    {
        $comment = new Comment();
        $comment->messaje = $request->input('messaje');
        $comment->user_id = auth()->user()->id;
        $comment->lodging_id = $request->input('lodging_id');
        $comment->save();

        return back()->with('success', 'Comentario agregado exitosamente');
    }

    public function delete($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return back()->with('success', 'Comentario eliminada exitosamente');
    }

    public function rating(Request $request)
    {
        $reservation = Reservation::findOrFail($request->input('reservation_id'));
        $lodging_id = $reservation->lodging_id;

        $user_id = auth()->id();

        // Verifica si el usuario ya ha calificado esta reserva
        if ($reservation->hasUserRated($user_id)) {
            return back()->with('error', 'Ya has calificado esta reserva.');
        }

        // Crea un nuevo rating para la reserva
        $rating = new Rating();
        $rating->number = $request->input('number');
        $rating->user_id = $user_id;
        $rating->reservation_id = $reservation->id;
        $rating->lodging_id = $lodging_id;
        $rating->save();

        return back()->with('success', 'Reserva calificada correctamente');
    }


}
