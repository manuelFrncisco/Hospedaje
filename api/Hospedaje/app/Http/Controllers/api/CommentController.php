<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function list()
    {
        $comments = Comment::all();

        $list = [];
        foreach ($comments as $comment) {
            $object = [
                "id" => $comment->id,
                "messaje" => $comment->messaje,
                "user_id" => $comment->user_id,
                "created_at" => $comment->created_at,
                "updated_at" => $comment->updated_at
            ];
            array_push($list, $object);
        }

        return response()->json($list);
    }
    public function show($id)
    {
        $comment = Comment::where('id', '=', $id)->first();


        $object = [
            "id" => $comment->id,
            "messaje" => $comment->messaje,
            "user_id" => $comment->user_id,
            "created_at" => $comment->created_at,
            "updated_at" => $comment->updated_at
        ];

        return response()->json($object);
    }

    public function indexByLodging($id)
    {
        
        $comments = Comment::where('lodging_id', $id)->get();

        $formattedComments = $comments->map(function ($comment) {
            return [
                'id' => $comment->id,
                'messaje' => $comment->messaje,
                'user' => [
                    'id' => $comment->user->id,
                    'name' => $comment->user->name,
                    'email' => $comment->user->email,
                ],
            ];
        });

        return response()->json($formattedComments);
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

            // Validar los datos del comentario
            $data = $request->validate([
                'messaje' => 'required|min:3',
                'lodging_id' => 'required|exists:lodgings,id',
            ]);

            // Crear el nuevo comentario
            $comment = new Comment();
            $comment->messaje = $data['messaje'];
            $comment->user_id = $user_id;
            $comment->lodging_id = $data['lodging_id'];
            $comment->save();

            return response()->json(['success' => 'Comentario creado correctamente'], 200);
        } else {
            // El usuario no está autenticado, manejar el caso en consecuencia
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            "id" => "required|integer|min:1",
            "user_id" => "max:2",
            "messaje" => "min:3|max:20",

        ]);

        $element = Comment::where('id', '=', $data['id'])->first();
        $element->user_id = $data['user_id'];
        $element->messaje = $data['messaje'];

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

