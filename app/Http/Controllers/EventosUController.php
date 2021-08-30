<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\UserEvento;
use App\Models\Evento;
use App\Models\MaterialEvento;
use App\Models\MaterialActividad;
use App\Models\User;
use App\Models\Panelista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventosUController extends Controller
{
    public function index()
    {     
        $user = Auth::user();    
        $id_user = $user->id;
        $email   = $user->email;
        
        $contenidos = DB::table('user_eventos')
                   ->join('eventos', 'user_eventos.id_evento', '=', 'eventos.id')
                   ->where('email', $email)
                   ->get();
                        
        $datos = $contenidos->count();
        //dd($contenidos);

        return view('eventos')->with('contenidos', $contenidos)->with('datos', $datos);
    }

    public function show($id)
    {
        //Perfil temporal de expositor para el demo
        return view('detalle.evento' , [
            'detalle' =>  Evento::find($id)      
        ]);  
    }
    
    public function panelistas($id)
    {                        
        $doc = $id;          
        $contenidos = DB::table('panelista_eventos')
                ->join('panelistas','panelista_eventos.id_panelista', '=','panelistas.id')
                ->where('id_evento', '=', $doc)                
                ->paginate(10);
                    
        $user = Auth::user();
        $datos = $contenidos->count();

        return view('detalle.panelistas-evento')->with('contenidos', $contenidos)->with(['user' => $user])->with(['event_id' => $doc])->with('datos', $datos);        
    }

    public function panelista($id)
    {
        $persona = DB::table('panelistas')
                        ->where('id', '=', $id)
                        ->get();

        //dd($persona);
        return view('detalle.panelista')->with('persona', $persona);
    }

    public function usuarios($id)
    {                        
        $doc = $id;          
        $contenidos = DB::table('user_eventos')
                ->join('users','user_eventos.email', '=','users.email')
                ->where('id_evento', '=', $doc)                
                ->paginate(10);
                    
        $user = Auth::user();
        $datos = $contenidos->count();

        //dd($contenidos);
        return view('detalle.usuarios-evento')->with('contenidos', $contenidos)->with(['user' => $user])->with(['event_id' => $doc])->with('datos', $datos);        
    }

    public function materiales($id)
    {                        
        $doc = $id;          
        $contenidos = DB::table('eventos')
                ->join('material_eventos','eventos.id', '=','material_eventos.id_evento')
                ->where('id_evento', '=', $doc)                
                ->paginate(10);
                    
        $user = Auth::user();
        $datos = $contenidos->count();

        //dd($contenidos);
        return view('detalle.materiales')->with('contenidos', $contenidos)->with(['user' => $user])->with(['event_id' => $doc])->with('datos', $datos);        
    }

    public function materialesdetalle($id)
    {
        //Perfil temporal de expositor para el demo
        return view('detalle.documento-evento' , [
            'detalle' =>  MaterialEvento::find($id)      
        ]);  
    }

    public function programacion($id)
    {
        $doc = $id;          
        $contenidos = DB::table('eventos')
                ->join('actividads','eventos.id', '=','actividads.id_evento')
                ->where('id_evento', '=', $doc)                
                ->paginate(10);
                    
        $user = Auth::user();
        $datos = $contenidos->count();

        //dd($contenidos);
        return view('detalle.programacion-detalle')->with('contenidos', $contenidos)->with(['user' => $user])->with(['event_id' => $doc])->with('datos', $datos);   
    }

    public function actividadpanelistas($id)
    {                        
        $doc = $id;          
        $contenidos = DB::table('panelista_actividads')
                ->join('panelistas','panelista_actividads.id_panelista', '=','panelistas.id')
                ->where('id_actividad', '=', $doc)                
                ->paginate(10);
                    
        $user = Auth::user();
        $datos = $contenidos->count();

        return view('detalle.panelistas-evento')->with('contenidos', $contenidos)->with(['user' => $user])->with(['event_id' => $doc])->with('datos', $datos);        
    }

    public function actividadmateriales($id)
    {                        
        $doc = $id;          
        $contenidos = DB::table('actividads')
                ->join('material_actividads','actividads.id', '=','material_actividads.id_actividad')
                ->where('id_actividad', '=', $doc)                
                ->paginate(10);
                    
        $user = Auth::user();
        $datos = $contenidos->count();

        //dd($contenidos);
        return view('detalle.materiales')->with('contenidos', $contenidos)->with(['user' => $user])->with(['event_id' => $doc])->with('datos', $datos);        
    }
    public function actividadmaterialesdetalle($id)
    {
        //Perfil temporal de expositor para el demo
        return view('detalle.documento-actividad' , [
            'detalle' =>  MaterialActividad::find($id)      
        ]);  
    }
}
