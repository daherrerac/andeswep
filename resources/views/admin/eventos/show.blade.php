@extends('layouts.admin')

@section('title', 'Evento')
    
@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="py-10"></div>                              
        <div class="w-100  md:w-1/3 mx-auto pt-20">
            <img src="{{ asset("/storage/".$evento->path) }}" alt="{{ $evento->titulo }}" class="block mx-auto p-2">
            <div>
                <div class="text-center">
                    <h3>                                
                        {{ $evento->titulo }}
                    </h3>
                </div>
            </div>
            
            <a href="{{ $evento->link }}" class="block text-center"> {{ $evento->link }}</a>

            <div class="mx-auto text-left ">
                                    
                
                <div class="flex mt-5">
                    <div class="w-1/2">
                        <h4>Fecha de inicio:</h4>
                        <p>
                            {{ $evento->fecha_inicio }}
                        </p>
                    </div>
                    
                    <div class="w-1/2">
                        <h4>Fecha de finalización</h4>
                        <p>
                            {{ $evento->fecha_fin }}
                        </p>
                    </div>
                </div>
                <div class="mt-4"></div>
                <h4>Descripción:</h4>
                <p class="text-left mb-5">                    
                    {!! $evento->descripcion !!} 
                </p>                    
            </div>                       
        </div>
        <div class="w-2/3 mx-auto icons">  
            <div class="grid grid-cols-3 gap-4 pb-5">                                                   
                <div class="col-auto">
                    <a href="{{url('admin/panelistasevento/show/'.$evento->id)}} ">
                        <img src="/images/orador_con-fondo.svg" alt="Perfil" class="block mx-auto mt-5 sm-icon">
                        <span>Panelistas</span>
                    </a>
                </div> 
                <div class="col-auto">
                    <a href="{{url('admin/participantesevento/show/'.$evento->id)}}">
                        <img src="/images/participantes_con-fondo.svg" alt="Perfil" class="block mx-auto mt-5 sm-icon">
                        <span>Participantes</span>
                    </a>
                </div>

                @foreach ($adicionales as $key => $value)

                    @if ($value->materiales =="1")
                        <div class="col-auto">
                            <a href="{{url('admin/materialevento/show/'.$evento->id)}}">
                                <img src="/images/materiales_con-fondo.svg" alt="Eventos" class="block mx-auto mt-5 sm-icon">
                                <span>Materiales</span>
                            </a>
                        </div>
                    @endif

                    @if ($value->videos =="1")
                        <div class="col-auto">
                            <a href="#">
                                <img src="/images/materiales_con-fondo.svg" alt="Eventos" class="block mx-auto mt-5 sm-icon">
                                <span>Videos</span>
                            </a>
                        </div>
                    @endif

                    @if ($value->faq =="1")
                        <div class="col-auto">
                            <a href="#">
                                <img src="/images/materiales_con-fondo.svg" alt="Eventos" class="block mx-auto mt-5 sm-icon">
                                <span>FAQ</span>
                            </a>
                        </div>
                    @endif
                    @if ($value->opiniones =="1")
                        <div class="col-auto">
                            <a href="{{url('admin/programacion/show/'.$evento->id)}} ">
                                <img src="/images/calendario.png" alt="Eventos" class="block mx-auto mt-5 sm-icon">
                                <span>Programación</span>
                            </a>
                        </div>
                    @endif

                @endforeach
                
                                                    
                                                                                          
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