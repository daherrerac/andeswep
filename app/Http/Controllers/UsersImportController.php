<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UsersImport;
use App\Imports\UsersEventoImport;
use App\Models\Evento;
use Maatwebsite\Excel\Facades\Excel;

class UsersImportController extends Controller
{
    public function show()
    {
        return view('users.import');
    }

    public function store(Request $request)
    {
        $file = $request-> file('file')->store('import');

        (new UsersImport)->import($file);
        
        return back()->with('success','Excel insertado correctamente.');
    }

    public function showeventos()
    {                
        $evento    = Evento::latest()->paginate(5);        
                    
        //dd($adicionales);
        return view('users.eventos',compact('evento'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
                
    }
    public function eventostore(Request $request)
    {
        $id_evento = $request['evento'];
        $file = $request-> file('file')->store('import');

        Excel::import(new UsersEventoImport($id_evento), $file);
        
        return back()->with('success','Excel insertado correctamente.');
    }
}
 