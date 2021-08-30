<?php

namespace App\Http\Controllers;

use App\Models\Turismo;
use Illuminate\Http\Request;

class TurismoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Turismo::latest()->paginate(5);
    
        return view('admin.turismo.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.turismo.create');
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
            'link' => 'required',
            'descripcion' => 'required',
            'imagen' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $name = $request->file('imagen')->getClientOriginalName();
         

        $file = $request->file('imagen');

        $nombre = $file->getClientOriginalName();
        \Storage::disk('local')->put("/public/images/". $nombre,  \File::get($file));
                        
 
        
        Turismo::create([
            'titulo'       => $request['titulo'],
            'link'         => $request['link'],
            'descripcion'  => $request['descripcion'],
            'imagen'       => $name,
            'path'         => "images/".$nombre
        ]);
     
        return redirect()->route('turismo.index')
                        ->with('success','Post creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Turismo  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Turismo $turismo)
    {
        return view('admin.turismo.show',compact('turismo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Turismo  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Turismo $turismo)
    {
        return view('admin.turismo.edit',compact('turismo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Turismo  $turismo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turismo $turismo)
    {
        $request->validate([
            'titulo' => 'required',
            'link' => 'required',
            'descripcion' => 'required',
        ]);
    
        $turismo->update($request->all());
    
        return redirect()->route('turismo.index')
                        ->with('success','Post editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Turismo  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turismo $turismo)
    {
        $turismo->delete();
    
        return redirect()->route('turismo.index')
                        ->with('success','Lugar borrado correctamente');
    }
}
