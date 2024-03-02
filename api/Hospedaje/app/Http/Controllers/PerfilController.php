<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $user = Auth::user();

        return view("perfil", compact('user'));
    }

    public function perfiledit()
    {
        $user = Auth::user();
        return view('perfil_update', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('perfil_update', compact('user'));
    }

    public function update(Request $request)
    {

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');

        $user->save();

        return redirect('/user')->with('success', 'Perfil actualizado exitosamente');
    }


}
