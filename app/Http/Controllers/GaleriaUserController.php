<?php

namespace App\Http\Controllers;

use App\Models\Galeria;
use Illuminate\Http\Request;

class GaleriaUserController extends Controller
{
    public function index()
    {
        $contenidos = Galeria::latest()->paginate(6);
        return view('galeria')->with('contenidos', $contenidos)->with(['success'=>'']);
    }
    public function store(Request $request)
    {
         $request->validate([
            'titulo' => 'required',                        
            'imagen' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $name = $request->file('imagen')->getClientOriginalName();
         
        $file = $request->file('imagen');

        $nombre = $file->getClientOriginalName();
        \Storage::disk('local')->put("/public/galeria/". $nombre,  \File::get($file));
                        
 
        
        Galeria::create([
            'titulo'       => $request['titulo'],
            'imagen'       => $name,
            'path'         => "galeria/".$nombre
        ]);
     
        return view('/galeria',['success'=>'Foto subida correctamente'])->with('contenidos', '');                        
    }
}
