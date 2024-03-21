<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Lodging;

class CommentController extends Controller
{
    
    public function index(){

        $comments = Comment::all();

        return view("admin.comments.index", compact('comments'));
    }

    public function comentarioCrear()
    {
        $lodgings = Lodging::all();

        return view("admin.comments.create", compact('lodgings'));
    }

    public function CommentCreate(Request $request)
    { 
        $request->validate([
            'messaje' => 'required|string',
            'user_id' => 'required|exists:users,id',
            'lodging_id' => 'required|exists:lodgings,id',
        ]);
    
        $comment = new Comment();
        $comment->messaje = $request->input('messaje');
        $comment->user_id = $request->input('user_id');
        $comment->lodging_id = $request->input('lodging_id');
        $comment->save();

        return redirect()->route("admin.comments.index");
    }

    public function comentarioEditar($id)
    {
        $comment = Comment::findOrFail($id);
        $lodgings = Lodging::all();
        return view("admin.comments.edit", compact('comment', 'lodgings'));
    }

    public function CommentEdit(Request $request, $id)
    {
    
            $data = $request->validate([
                'messaje' => 'required|string',
                'user_id' => 'required',
                'lodging_id' => 'required'
            ]);
    
            $comment = Comment::findOrFail($id);
            $comment->messaje = $data['messaje'];
            $comment->user_id = auth()->user()->id;
            $comment->lodging_id = $data['lodging_id'];

            $comment->save();
    
            return redirect()->route('admin.comments.index');
    
    }

    public function commentDelete($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('admin.comments.index');
    }

}

