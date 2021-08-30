@extends('layouts.admin')

@section('title', 'Actividad')
    
@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="py-10"></div>                              
        <div class="w-100  md:w-1/3 mx-auto pt-20">
            
            <div>
                <div class="text-center">
                    <h3>                                
                        {{ $actividade->titulo }}
                    </h3>
                </div>
            </div>
            
            

            <div class="mx-auto text-left ">
                                    
                
                <div class="flex mt-5">
                    <div class="w-1/2">
                        <h4>Fecha de inicio:</h4>
                        <p>
                            {{ $actividade->fecha_inicio }}
                        </p>
                    </div>
                    
                    <div class="w-1/2">
                        <h4>Fecha de finalización</h4>
                        <p>
                            {{ $actividade->fecha_fin }}
                        </p>
                    </div>
                </div>
                <div class="flex mt-5">
                    <div class="w-1/2">
                        <h4>Hora de inicio:</h4>
                        <p>
                            {{ $actividade->hora_inicio }}
                        </p>
                    </div>
                    
                    <div class="w-1/2">
                        <h4>Hora de finalización</h4>
                        <p>
                            {{ $actividade->hora_fin }}
                        </p>
                    </div>
                </div>
                <div class="mt-4"></div>
                <h4>Descripción:</h4>
                <p class="text-left mb-5">                    
                    {!! $actividade->descripcion !!} 
                </p>                    
            </div>                       
        </div>
        <div class="w-2/3 mx-auto icons">  
            <div class="grid grid-cols-3 gap-4 pb-5">                                                   
                <div class="col-auto">
                    <a href="{{url('/admin/panelistasactividad/show/'.$actividade->id)}} ">
                        <img src="/images/orador_con-fondo.svg" alt="Perfil" class="block mx-auto mt-5 sm-icon">
                        <span>Panelistas</span>
                    </a>
                </div> 
                <div class="col-auto">
                    <a href="#">
                        <img src="/images/participantes_con-fondo.svg" alt="Perfil" class="block mx-auto mt-5 sm-icon">
                        <span>Participantes</span>
                    </a>
                </div>  
                <div class="col-auto">
                    <a href="{{url('admin/materialactividad/show/'.$actividade->id)}}">
                        <img src="/images/materiales_con-fondo.svg" alt="Eventos" class="block mx-auto mt-5 sm-icon">
                        <span>Materiales</span>
                    </a>
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