<?php

namespace App\Http\Controllers;

use App\Models\Lodging;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $recentLodgings = Lodging::orderByDesc('created_at')
        ->take(4) // Obtener los 5 alojamientos más recientes
        ->get();


        $popularLodgings = Lodging::withCount('ratings')
        ->orderByDesc('ratings_count')
        ->take(4)
        ->get();

        $popularLodgingsComments = Lodging::withCount('comments')
        ->orderByDesc('comments_count')
        ->take(4) // Obtener los 5 alojamientos más comentados
        ->get();

        return view('home', [
            'popularLodgings' => $popularLodgings,
            'recentLodgings' => $recentLodgings,
            'popularLodgingsComments' => $popularLodgingsComments,

        ]);
    }

}
