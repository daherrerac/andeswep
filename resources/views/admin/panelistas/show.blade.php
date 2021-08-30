@extends('layouts.admin')

@section('title', 'Evento')
    
@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="py-10"></div>  
        <div class="w-100  md:w-1/3 mx-auto pt-10">
            <img src="{{ asset("/storage/".$panelista->path) }}" alt="{{ $panelista->nombre }}" class="block mx-auto p-2">
            <div>
                <div class="text-center">
                    <h3>                                
                        {{ $panelista->nombre }}
                    </h3>
                </div>
            </div>
            
            

            <div class="bloque-iconos my-5 flex">
                <a href="{{ $panelista->fb }}" target="_blank" >
                    <img src="/images/icons8-facebook-96.png" class="social-icons">
                </a>
                <a href="{{ $panelista->ig }}" target="_blank" >
                    <img src="/images/icons8-instagram-96.png" class="social-icons">
                </a>
                <a href="{{ $panelista->tw }}" target="_blank" >
                    <img src="/images/icons8-twitter-96.png" class="social-icons">
                </a>
                <a href="{{ $panelista->li }}" target="_blank" >
                    <img src="/images/icons8-linkedin-96.png" class="social-icons">
                </a>
            </div>

            <h4 class="text-center">
                Resúmen
            </h4>
            <p class="my-5">
                {{ $panelista->resumen }}                                                                                                
            </p>

            <h4 class="text-center">
                Hoja de vida
            </h4>
            
                                           
            <p class="text-left my-5"> {!! $panelista->hv !!} </p>                
            
            
            <h4>
                Contacto
            </h4>
            <div class="flex">
                <div class="w-1/2">
                    <label for="">Correo</label>
                    <a href="mailto:{{ $panelista->mail }}" style="font-size: 80%"> {{ $panelista->mail }}</a>
                </div>

                <div class="w-1/2">
                    <label for="">Teléfono</label>
                    <a href="#" style="font-size: 80%"> {{ $panelista->telefono }}</a>
                </div>

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