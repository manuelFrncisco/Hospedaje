<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
class LevelController extends Controller
{
        public function index()
        {
            $levels = Level::all();

            return view('admin.levels.index', compact('levels'));
        }
}
