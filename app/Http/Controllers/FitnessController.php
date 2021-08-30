<?php

namespace App\Http\Controllers;

use App\Models\Fitness;
use Illuminate\Http\Request;

class FitnessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Fitness::latest()->paginate(5);
    
        return view('admin.fitness.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fitness.create');
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
            'tipo' => 'required',
            'imagen' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $name = $request->file('imagen')->getClientOriginalName();
         

        $file = $request->file('imagen');

        $nombre = $file->getClientOriginalName();
        \Storage::disk('local')->put("/public/fitness/". $nombre,  \File::get($file));
                        
 
        
        Fitness::create([
            'titulo'       => $request['titulo'],            
            'descripcion'  => $request['descripcion'],
            'imagen'       => $name,
            'path'         => "fitness/".$nombre,
            'tipo'       => $request['tipo'],
        ]);
     
        return redirect()->route('fitness.index')
                        ->with('success','Evento creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Fitness $fitness)
    {
        return view('admin.fitness.show',compact('fitness'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Fitness $fitness)
    {
        return view('admin.fitness.edit',compact('fitness'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fitness $fitness)
    {
        $request->validate([
            'titulo' => 'required',            
            'descripcion' => 'required',
        ]);
    
        $fitness->update($request->all());
    
        return redirect()->route('fitness.index')
                        ->with('success','Post editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fitness $fitness)
    {
        $fitness->delete();
    
        return redirect()->route('fitness.index')
                        ->with('success','Evento borrado correctamente');
    }
}
