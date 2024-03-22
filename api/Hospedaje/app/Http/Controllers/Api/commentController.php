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
    public function create(Request $request){
            
        $data = $request->validate([
            "messaje"=> "min:3",
            "user_id"=> "max:2"
        ]);
        $comments = Comment::create([
            "messaje" => $data["messaje"],
            "user_id"=> $data["user_id"],
        ]);
        if($comments){
            $object = [
                "response" => "Success. Items is correct",
                "date"  => $comments
            ];
            return response()->json($comments);
        }else{
            $object = [
                "response" => "Error: Something went wrong, please try again."
            ];
        }
        return response()->json($object);
    }
    public function update(Request $request){
        $data = $request->validate([
            "id"=> "required|integer|min:1",
            "user_id"=> "max:2",
            "messaje"=> "min:3|max:20",
            
        ]);

        $element = Comment::where('id', '=', $data['id'])->first();
        $element->user_id = $data['user_id'];
        $element->messaje = $data['messaje'];
        
        if($element->update){
            $object = [
                "response" => "Success. Items is correct",
                "date"  => $element
            ];
            return response()->json($element);
        }else{
            $object = [
                "response" => "Error: Something went wrong, please try again."
            ];
        }
        return response()->json($object);
    }
}

