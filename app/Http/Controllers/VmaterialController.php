<?php

namespace App\Http\Controllers;

use App\Models\Vmaterial;
use Illuminate\Http\Request;

class VmaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Vmaterial::latest()->paginate(5);
    
        return view('admin.vmaterial.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vmaterial.create');
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
            'url' => 'required',
        ]);
    
        Vmaterial::create($request->all());
     
        return redirect()->route('vmaterial.index')
                        ->with('success','Video insertado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vmaterial  $vmaterial
     * @return \Illuminate\Http\Response
     */
    public function show(Vmaterial $vmaterial)
    {
        return view('admin.vmaterial.show',compact('vmaterial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vmaterial  $vmaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(Vmaterial $vmaterial)
    {
        return view('admin.vmaterial.edit',compact('vmaterial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vmaterial  $vmaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vmaterial $vmaterial)
    {
        $request->validate([
            'titulo' => 'required',
            'url' => 'required',
        ]);
    
        $video->update($request->all());
    
        return redirect()->route('vmaterial.index')
                        ->with('success','Video editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vmaterial  $vmaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vmaterial $vmaterial)
    {
        $video->delete();
    
        return redirect()->route('vmaterial.index')
                        ->with('success','Video borrado correctamente');
    }
}
