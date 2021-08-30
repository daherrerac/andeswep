@extends('layouts.admin')

@section('title', 'Evento')
    
@section('content')


    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        

            <div class="py-10"></div>                          
                <div class="w-2/3  md:w-1/2 mx-auto">
                    <img src="{{ asset("/storage/".$fitness->path) }}" alt="{{ $fitness->titulo }}" class="block mx-auto p-2 w-1/3">
                    <div>
                        <div class="text-center">
                            <h3>                                
                                {{ $fitness->titulo }}
                            </h3>
                        </div>
                    </div>
                    <div class="">
                        <div class="mx-auto text-center ">
                                                        
                            <p class="text-left my-5 px-5"> {!! $fitness->descripcion !!} </p>
                            
                        </div>
                    </div>
                </div>
                <p class="text-center">
                    <strong class="py-3">Tipo de evento</strong>
                    @if ( $fitness->tipo == "gps" )
                        <img src="/images/mapas-de-google.svg" alt="" class="block mx-auto w-12">
                    @else
                        <img src="/images/ejes-de-coordenadas.svg" alt="" class="block mx-auto w-12">
                    @endif
                </p>
                <button onclick="goBack()" class="verde-lima-bg text-white py-2 px-4 border border-gray-400 rounded shadow">
                    <img src="/images/back-arrow-svgrepo-com.svg" alt="" class="inline-flex w-4 mr-2">
                    Volver
                </button>
        
                <script>
                    function goBack() {
                        window.history.back();
                    }
                </script> 
        
    </div>

@endsection