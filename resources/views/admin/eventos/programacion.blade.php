@extends('layouts.admin')

@section('title', 'Evento')
    
@section('content')

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="py-10"></div>
               
            @foreach ($contenidos as $contenido)
            <div class="mb-5"></div>
            <div class="bg-white  overflow-hidden shadow-xl sm:rounded-lg "> 

                <div class="grid grid-cols-5 gap-2 listado py-5">                
                    
                    <div class="col-auto">                                                    
                        <p class="my-5 ml-5">
                            {{$contenido->titulo}}
                        </p>                                                                                        
                    </div>
                    <div class="col-auto">
                        <strong class="block verde-andes mt-5">{{ $contenido->descripcion}}</strong>                    
                    </div>

                    <div class="col-auto">
                        <div class="flex mt-5 ml-5">
                            <div class="w-auto mr-5">
                                <span>Fecha inicio</span><br>
                                {{$contenido->fecha_inicio}}
                            </div>
                            <div class="w-auto">
                                <span>Fecha fin</span><br>
                                {{$contenido->fecha_fin}}
                            </div>
                        </div>
                    </div>

                    <div class="col-auto">
                        <div class="flex mt-5 ml-5">
                            <div class="w-auto mr-5">
                                <span>Hora inicio</span><br>
                                {{$contenido->hora_inicio}}
                            </div>
                            <div class="w-auto">
                                <span>Hora fin</span><br>
                                {{$contenido->hora_fin}}
                            </div>
                        </div>
                    </div>

                    <div class="col-auto my-auto text-right">
                        <a class="block mx-auto" href="{{ route('actividades.show',$contenido->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 verde-andes block mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div> 

                    
                        
                    
                </div>
        
            
            </div>                     
            @endforeach
            <div class="row nav-pagination">
                <div class="offset-lg-5 col-lg-1 col-2 offset-4 ">
                    {{-- {{  $contenido->links() }} --}}
                </div>
            </div>
        
        <div class="py-5"></div>
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



