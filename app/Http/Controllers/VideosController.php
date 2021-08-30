<?php

namespace App\Http\Controllers;

use App\Models\Videos;
use Illuminate\Http\Request;


class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Videos::latest()->paginate(5);
    
        return view('admin.videos.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videos.create');
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
    
        Videos::create($request->all());
     
        return redirect()->route('videos.index')
                        ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Videos  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Videos $video)
    {
        return view('admin.videos.show',compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Videos  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Videos $video)
    {
        return view('admin.videos.edit',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Videos  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Videos $video)
    {
        $request->validate([
            'titulo' => 'required',
            'url' => 'required',
        ]);
    
        $video->update($request->all());
    
        return redirect()->route('videos.index')
                        ->with('success','Video editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Videos  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Videos $video)
    {
        $video->delete();
    
        return redirect()->route('videos.index')
                        ->with('success','Video borrado correctamente');
    }
}