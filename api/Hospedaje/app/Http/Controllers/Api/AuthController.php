<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{

    
    public function login(Request $request)
    {

        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response([
                'response' => 'Invalid Credentials',
                'message' => 'Error'
            ]);
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response([
            
            'profile' => auth()->user(),
            'message' => 'success'
        ]);


    }

    public function logout(Request $request)
    {

    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3,max:50',
            'surname' => 'required|min:3,max:50',
            'email' => 'required|min:1,max:50',
            'phone' => 'required|min:1,max:50',
            'password' => 'required|min:1,max:50',
            'image' => 'required'
        ]);

        $User = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => $data['password'],
            'image' => $data['image']

        ]);

        if ($User) {
            $object = [

                "response" => 'Succes.Itemsaved correctly.',
                "data" => $User

            ];

            return response()->json($object);
        } else {
            $object = [

                "response" => 'Error:Something went wrong, please try again.',

            ];

            return response()->json($object);
        }

    }
    public function show()
    {
        if (auth()->check()) {
            $user = auth()->user();
            return response()->json([
                'profile' => $user,
                'message' => 'success'
            ]);
        } else {
            // Agrega un registro para verificar si el usuario está autenticado correctamente
            \Log::info('El usuario no está autenticado.');
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

}