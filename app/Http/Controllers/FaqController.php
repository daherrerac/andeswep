<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;



class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Faq::latest()->paginate(5);
    
        return view('admin.faq.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faq.create');
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
            'respuesta' => 'required',
        ]);
    
        Faq::create($request->all());
     
        return redirect()->route('faq.index')
                        ->with('success','Post creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        return view('admin.faq.show',compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('admin.faq.edit',compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'titulo' => 'required',
            'respuesta' => 'required',
        ]);
    
        $faq->update($request->all());
    
        return redirect()->route('faq.index')
                        ->with('success','Pregunta editada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
    
        return redirect()->route('faq.index')
                        ->with('success','Pregunta borrada correctamente');
    }
}
