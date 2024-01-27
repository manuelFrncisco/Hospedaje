<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class commentController extends Controller
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
}

