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

        public function levelShow($id)
        {
            $level = Level::findOrFail($id);

            return view('admin.levels.show', compact('level'));
        }

        public function levelEditar($id)
        {
            $level = Level::findOrFail($id);
            
            return view('admin.levels.edit', compact('level'));
        }

        public function LevelEdit(Request $request, $id)
        {
            $data = $request->validate([
                'name' => 'required|string',
                'status' => 'required|integer',
            ]);
    
            $reservation = Level::findOrFail($id);
            $reservation->name = $data['name'];
            $reservation->status = $data['status'];
            $reservation->save();
    
            return redirect()->route('admin.levels.index');
        }

        public function levelCrear()
        {
            $level = Level::all();

            return view("admin.levels.create", compact('level'));
        }

        public function LevelCreate(Request $request)
        {
            $request->validate([
                'name' => 'required|string',
                'status' => 'required|integer',
            ]);
        
            $level = new Level();
            $level->name = $request->input('name');
            $level->status = $request->input('status');
            $level->save();
        
            return redirect('admin.levels.index');
        }

        public function LevelDelete($id)
        {
            $level = Level::findOrFail($id);
            $level->delete();
            
            return redirect()->route('admin.levels.index');
        }
}
