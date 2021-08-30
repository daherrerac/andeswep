<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\AdicionalEvento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data  = Evento::latest()->paginate(5);
        
    
        return view('admin.eventos.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',            
            'descripcion' => 'required',
            'imagen' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ]);

        $name = $request->file('imagen')->getClientOriginalName();
         

        $file = $request->file('imagen');

        $nombre = $file->getClientOriginalName();
        \Storage::disk('local')->put("/public/eventos/". $nombre,  \File::get($file));
                        
 
        
        Evento::create([
            'titulo'       => $request['titulo'],
            'link'         => $request['link'],
            'descripcion'  => $request['descripcion'],
            'imagen'       => $name,
            'fecha_inicio' => $request['fecha_inicio'],
            'fecha_fin'    => $request['fecha_fin'],
            'path'         => "eventos/".$nombre
        ]);
     
        $event_id = Evento::latest()->first()->id;

        AdicionalEvento::create ( [
            'id_evento'     =>  $event_id,
            'info_interes'  =>  '0',
            'opiniones'     =>  '0',
            'materiales'    =>  '0',
            'videos'        =>  '0',
            'faq'           =>  '0',
        ]);

        return redirect()->route('eventos.index')
                        ->with('success','Post creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show(Evento $evento)
    {
        $id = $evento->id;
        $adicionales = DB::table('adicional_eventos')
                        ->where('id_evento', '=', $id)
                        ->get();
        
                
        //dd($adicionales);               
        return view('admin.eventos.show', compact('evento'))->with(compact('adicionales'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        return view('admin.eventos.edit',compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evento $evento)
    {
        $request->validate([
            'titulo' => 'required',
            'link' => 'required',
            'descripcion' => 'required',
            'fecha_inicio' => 'required',
        ]);
    
        $evento->update($request->all());
    
        return redirect()->route('eventos.index')
                         ->with('success','Post editado correctamente');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evento $evento)
    {
        $evento->delete();
    
        return redirect()->route('eventos.index')
                        ->with('success','Evento borrado correctamente');
    }
}
