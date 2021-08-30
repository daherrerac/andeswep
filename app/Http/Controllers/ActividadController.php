<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data  = Actividad::latest()->paginate(5);
        $adicionales = DB::table('eventos')                         
                         ->get();
        
    
        //dd($adicionales);
        return view('admin.actividades.index',compact('data'),compact('adicionales'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data  = Evento::latest()->paginate(5);
        
    
        return view('admin.actividades.create',compact('data'))
               ->with('i', (request()->input('page', 1) - 1) * 5);        
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
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'hours' => 'required',
            'hours_end' => 'required',
        ]);
        if($request['minutes']  == '' || $request['minutes'] == null  || $request['minutes']  == '0' )
            $request['minutes'] = '00';  
        if($request['minutes_end']  == '' || $request['minutes_end'] == null  || $request['minutes_end']  == '0' )
            $request['minutes_end'] = '00';                
        
        Actividad::create([
            'id_evento'    => $request['evento'],
            'titulo'       => $request['titulo'],            
            'descripcion'  => $request['descripcion'],            
            'fecha_inicio' => $request['fecha_inicio'],
            'hora_inicio'  => $request['hours'].':'.$request['minutes'].' '.$request['ampm'],
            'fecha_fin'    => $request['fecha_fin'],            
            'hora_fin'     => $request['hours_end'].':'.$request['minutes_end'].' '.$request['ampm_end']
        ]);
     
        

         return redirect()->route('actividades.index')
                         ->with('success','Post creado correctamente.');
        //dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function show(Actividad $actividade)
    {
        // $id = $evento->id;
        // $adicionales = DB::table('adicional_eventos')
        //                 ->where('id_evento', '=', $id)
        //                 ->get();
        
                
        //dd($actividad->id);               
        return view('admin.actividades.show', compact('actividade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function edit(Actividad $actividade)
    {
        //dd($actividad); 
        return view('admin.actividades.edit',compact('actividade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actividad $actividade)
    {
        $request->validate([
            'titulo' => 'required',            
            'descripcion' => 'required',            
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'hours' => 'required',
            'hours_end' => 'required',
        ]);
    
        $actividade->update($request->all());
    
        return redirect()->route('actividades.index')
                         ->with('success','Post editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actividad $actividade)
    {
        $actividade->delete();
    
        return redirect()->route('actividades.index')
                        ->with('success','Actividad borrada correctamente');
    }
}
