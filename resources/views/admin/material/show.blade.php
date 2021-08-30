@extends('layouts.admin')

@section('title', 'Actividad')
    
@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="py-10"></div>                              
        <div class="w-100  md:w-1/3 mx-auto pt-20">
            
            <div>
                <div class="text-center">
                    <h3>                                
                        {{ $material->titulo }}
                    </h3>
                </div>
                <img src="{{ asset("/storage/".$material->path) }}" alt="{{ $material->titulo }}" class="block mx-auto p-2">
            </div>
            
            

            <div class="mx-auto text-left ">
                                                                                    
                <div class="mt-4"></div>
                <h4>Descripción:</h4>
                <p class="text-left mb-5">                    
                    {!! $material->descripcion !!} 
                </p>
                <a href="{{ $material->link }}" class="block text-center"> {{ $material->link }}</a>                    
            </div>                       
        </div>
         
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