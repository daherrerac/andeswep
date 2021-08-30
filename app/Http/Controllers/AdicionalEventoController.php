<?php

namespace App\Http\Controllers;

use App\Models\AdicionalEvento;
use App\Models\Actividad;
use App\Models\Panelista;
use App\Models\Evento;
use App\Models\MaterialEvento;
use App\Models\MaterialActividad;
use App\Models\PanelistaEvento;
use App\Models\PanelistaActividad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdicionalEventoController extends Controller
{
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdicionalEvento  $adicionalEvento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdicionalEvento $adicionalEvento)
    {
        $request->validate([
            'info' => 'required',
            'opiniones' => 'required',
            'materiales' => 'required',
            'videos' => 'required',
            'faq' => 'required',
        ]);
    
        $evento->update($request->all());
        dd($request->all());
        // return redirect()->route('admin.eventos.index')
        //                  ->with('success','Post editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdicionalEvento  $adicionalEvento
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdicionalEvento $adicionalEvento)
    {
        //
    }


    public function storeUpdate(Request $request, AdicionalEvento $adicionalEvento)
    {        
        if($request['info_interes']  == '' || $request['info_interes'] == null  )
            $request['info_interes'] = '0';
        if($request['opiniones'] == '' || $request['opiniones'] == null )
            $request['opiniones']  = '0';
        if($request['materiales'] == '' || $request['materiales'] == null )
            $request['materiales']   = '0';
        if($request['videos'] == '' || $request['videos'] == null )
            $request['videos']  = '0';
        if( $request['faq'] == '' || $request['faq']== null)
            $request['faq']  = '0';


        $validated = $request->except(['_token']);
                

        $affected = DB::table('adicional_eventos')
            ->where('id_evento', $request['id_evento'] )
            ->update($validated);
        
            
        //dd($request->all());
        return redirect()->route('eventos.index')
                        ->with('success','Post editado correctamente');
    } 

    public function evento(){        

        $evento    = Evento::latest()->paginate(5);
        $panelista = Panelista::latest()->paginate(5);
                    
        //dd($adicionales);
        return view('admin.panelistas.evento',compact('evento'),compact('panelista'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }  
    public function eventopost(Request $request){        

        $request->validate([
            'panelista' => 'required',
            'evento'    => 'required',
            'organizador'  => 'required',
        ]);

        PanelistaEvento::create([
            'id_panelista' => $request['panelista'],
            'id_evento'    => $request['evento'],
            'organizador'  => $request['organizador'],                        
        ]);
        
            
        $evento    = Evento::latest()->paginate(5);
        $panelista = Panelista::latest()->paginate(5);
                        
            //dd($adicionales);
        return view('admin.panelistas.evento',compact('evento'),compact('panelista'))
            ->with('i', (request()->input('page', 1) - 1) * 5)->with('success','Panelista vinculado correctamente');
    } 

    public function actividad(){        

        $evento    = Actividad::latest()->paginate(5);
        $panelista = Panelista::latest()->paginate(5);
                    
        //dd($adicionales);
        return view('admin.panelistas.actividad',compact('evento'),compact('panelista'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }  
    public function actividadpost(Request $request){        

        $request->validate([
            'panelista' => 'required',
            'evento'    => 'required',
            'organizador'  => 'required',
        ]);

        PanelistaActividad::create([
            'id_panelista' => $request['panelista'],
            'id_actividad' => $request['evento'],
            'organizador'  => $request['organizador'],                        
        ]);
        
            
        $evento    = Actividad::latest()->paginate(5);
        $panelista = Panelista::latest()->paginate(5);
                        
            //dd($adicionales);
        return view('admin.panelistas.actividad',compact('evento'),compact('panelista'))
            ->with('i', (request()->input('page', 1) - 1) * 5)->with('success','Panelista vinculado correctamente');
    } 
    

    public function materialevento(){        

        $evento    = Evento::latest()->paginate(5);        
                    
        //dd($adicionales);
        return view('admin.material.evento',compact('evento'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function materialeventopost(Request $request){

        $request->validate([
            'evento' => 'required',
            'titulo' => 'required',            
            'descripcion' => 'required',
            'imagen' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $name = $request->file('imagen')->getClientOriginalName();
         

        $file = $request->file('imagen');

        $nombre = $file->getClientOriginalName();
        \Storage::disk('local')->put("/public/images/". $nombre,  \File::get($file));
                        
 
        
        MaterialEvento::create([
            'id_evento'    => $request['evento'],
            'titulo'       => $request['titulo'],
            'link'         => $request['link'],
            'descripcion'  => $request['descripcion'],
            'imagen'       => $name,
            'path'         => "images/".$nombre
        ]);
     
        return redirect()->route('material.index')
                        ->with('success','Post creado correctamente.');
    }

    public function materialactividad(){        

        $evento    = Actividad::latest()->paginate(5);        
                    
        //dd($adicionales);
        return view('admin.material.actividad',compact('evento'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function materialactividadpost(Request $request){

        $request->validate([
            'evento' => 'required',
            'titulo' => 'required',
            'link' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $name = $request->file('imagen')->getClientOriginalName();
         

        $file = $request->file('imagen');

        $nombre = $file->getClientOriginalName();
        \Storage::disk('local')->put("/public/images/". $nombre,  \File::get($file));
                        
 
        
        MaterialActividad::create([
            'id_actividad' => $request['evento'],
            'titulo'       => $request['titulo'],
            'link'         => $request['link'],
            'descripcion'  => $request['descripcion'],
            'imagen'       => $name,
            'path'         => "images/".$nombre
        ]);
     
        return redirect()->route('material.index')
                        ->with('success','Post creado correctamente.');
    }
    public function panelistashow($id){ 

        $evento = $id;

        $contenidos = DB::table('panelista_eventos')
                ->where('id_evento', '=', $evento)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
                    
        $user = Auth::user();
        $panelista = Panelista::latest()->paginate(5);
                    
                
        return view('admin.eventos.panelistas',compact('panelista'))->with('i', (request()->input('page', 1) - 1) * 5)->with('contenidos', $contenidos);
        //dd($contenidos);
    }
    public function programacionshow($id){ 

        $evento = $id;

        $contenidos = DB::table('actividads')
                ->where('id_evento', '=', $evento)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
                    
        $user = Auth::user();
                            
                
        return view('admin.eventos.programacion')->with('i', (request()->input('page', 1) - 1) * 5)->with('contenidos', $contenidos);
        //dd($contenidos);
    }
    public function panelistashowactividad($id){ 

        $evento = $id;

        $contenidos = DB::table('panelista_actividads')
                ->where('id_actividad', '=', $evento)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
                    
        $user = Auth::user();
        $panelista = Panelista::latest()->paginate(5);
                    
                
        return view('admin.actividades.panelistas',compact('panelista'))->with('i', (request()->input('page', 1) - 1) * 5)->with('contenidos', $contenidos);
        //dd($contenidos);
    }

    public function materialshow($id){ 

        $evento = $id;

        $contenidos = DB::table('material_eventos')
                ->where('id_evento', '=', $evento)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
                                                        
                
        return view('admin.eventos.material')->with('i', (request()->input('page', 1) - 1) * 5)->with('contenidos', $contenidos);
        //dd($contenidos);
    }
    public function materialactividadshow($id){ 

        $evento = $id;

        $contenidos = DB::table('material_actividads')
                ->where('id_actividad', '=', $evento)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
                                                        
                
        return view('admin.actividades.material')->with('i', (request()->input('page', 1) - 1) * 5)->with('contenidos', $contenidos);
        //dd($contenidos);
    }
    public function participanteshow($id){ 

        $evento = $id;

        $contenidos = DB::table('user_eventos')
                ->where('id_evento', '=', $evento)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
                    
        $user = Auth::user();
        $panelista = Panelista::latest()->paginate(5);
                    
                
        return view('admin.eventos.participantes',compact('panelista'))->with('i', (request()->input('page', 1) - 1) * 5)->with('contenidos', $contenidos);
        //dd($contenidos);
    }
}
