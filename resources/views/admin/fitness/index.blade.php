@extends('layouts.admin')

@section('title', 'Admin Eventos')
    
@section('content')
    @if(Auth::user()->hasRole('admin'))  

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-left py-20">
            Eventos fitness
        </h1>

        <div class="w-full block">
            <a class="verde-lima-bg text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow" href="{{ route('fitness.create') }}"> Insertar nuevo</a>
        </div>
        @if ($message = Session::get('success'))                
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-10 shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>                        
                    <p class="text-sm">{{ $message }}</p>
                    </div>
                </div>
            </div>
        @endif


        <div class="icon-container">             
                
            <div class="md:w-1/2 w-2/3 block mx-auto">
            
                <div class="grid grid-cols-2 gap-4">
                    @foreach ($data as $key => $value)
                        <div class="col-auto">
                            <p>
                                <span class="mx-3">Título evento: {{ $value->titulo }} </span>
                            </p>
                            <img src="{{ asset("/storage/".$value->path) }}" alt="{{ $value->titulo }}" class="block mx-auto p-2">
                            <p><span> {{ \Str::limit($value->descripcion, 30) }}</span></p>
                            <div class="py-3"></div>
                            <p class="text-center">
                                <strong class="py-3">Tipo de evento</strong>
                                @if ( $value->tipo == "gps" )
                                    <img src="/images/mapas-de-google.svg" alt="" class="block mx-auto w-12">
                                @else
                                    <img src="/images/ejes-de-coordenadas.svg" alt="" class="block mx-auto w-12">
                                @endif
                            </p>
                            <p>
                                <form action="{{ route('fitness.destroy',$value->id) }}" method="POST" class="block mx-auto my-5 text-center">
                            
                                    <a class="azul-andes-bg  text-white  py-2 px-4 border border-gray-400 rounded shadow" href="{{ route('fitness.show',$value->id) }}">Mostrar</a>    
                                    <a class="verde-lima-bg text-white  py-2 px-4 border border-gray-400 rounded shadow" href="{{ route('fitness.edit',$value->id) }}">Editar</a>   
                                    @csrf
                                    @method('DELETE')      
                                    <button type="submit" class="azul-andes-bg text-white py-2 px-4 border border-white-400 rounded shadow">Borrar</button>
                                </form>
                            </p>
                            
                        </div>
                    @endforeach
                    
                </div>
            </div>
    
            
            {!! $data->links() !!} 
        </div>
        <div class="bg-white shadow-md rounded my-6 py-6">
            <a class="azul-andes-bg text-white py-2 px-4 ml-2 border border-white-400 rounded shadow" href="/admin/estadisticas">Estadisticas eventos</a>            
        </div>
    </div>

    @endif
@endsection

  