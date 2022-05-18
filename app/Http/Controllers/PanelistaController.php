<?php

namespace App\Http\Controllers;

use App\Models\Panelista;
use Illuminate\Http\Request;

class PanelistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data    = Panelista::latest()->paginate(5);        
    
        return view('admin.panelistas.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.panelistas.create');
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
            'nombre' => 'required',            
            'profile_picture' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',            
            'hv' => 'required',
        ]);

        $name = $request->file('profile_picture')->getClientOriginalName();
         

        $file = $request->file('profile_picture');

        $nombre = $file->getClientOriginalName();
        \Storage::disk('local')->put("/public/panelistas/". $nombre,  \File::get($file));
                        
 
        
        Panelista::create([
            'event_id'        => $request['event_id'],            
            'nombre'          => $request['nombre'],
            'profile_picture' => $name,
            'path'            => "panelistas/".$nombre,
            'fb'              => $request['fb'],
            'tw'              => $request['tw'],
            'ig'              => $request['ig'],
            'li'              => $request['li'],
            'mail'            => $request['mail'],
            'telefono'        => $request['telefono'],
            'resumen'         => $request['resumen'],
            'hv'              => $request['hv'],                        
        ]);
     
        return redirect()->route('panelistas.index')
                        ->with('success','Post creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Panelista  $panelista
     * @return \Illuminate\Http\Response
     */
    public function show(Panelista $panelista)
    {
        return view('admin.panelistas.show',compact('panelista'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Panelista  $panelista
     * @return \Illuminate\Http\Response
     */
    public function edit(Panelista $panelista)
    {
        return view('admin.panelistas.edit',compact('panelista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Panelista  $panelista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Panelista $panelista)
    {
        $request->validate([
            'nombre' => 'required',
            'mail' => 'required',
            'resumen' => 'required',
        ]);
    
        $panelista->update($request->all());
    
        return redirect()->route('panelistas.index')
                        ->with('success','Post editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Panelista  $panelista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Panelista $panelista)
    {
        $panelista->delete();
    
        return redirect()->route('panelistas.index')
                        ->with('success','Panelista borrado correctamente');
    }
}
