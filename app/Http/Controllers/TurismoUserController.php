<?php

namespace App\Http\Controllers;

use App\Models\Turismo;
use Illuminate\Http\Request;

class TurismoUserController extends Controller
{
    public function index()
    {
        $contenidos = Turismo::all();
        return view('turismo')->with('contenidos', $contenidos);
    }

    public function show($id)
    {
        //Perfil temporal de expositor para el demo
        return view('detalle.turismo' , [
            'detalle' =>  Turismo::find($id)      
        ]);  
    }
}
