<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){

        $users = User::all();
        
        return view("admin.users.index", compact('users'));
    }
    public function usuarioCrear(){

        return view('admin.users.create');
    }

    public function UserCreate(){

    }
    public function usuarioEditar(){
        return view('admin.users.edit');
    }
    public function UserEdit(){

    }
    public function UserDelete(){
    }
}
