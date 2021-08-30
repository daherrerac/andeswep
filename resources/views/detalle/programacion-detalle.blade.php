<x-app-layout>


    <div class="py-20"></div>    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-1 lg:grid-cols-1">
            @if ($datos > 0)
    
                @foreach ($contenidos as $contenido)
                    <div class="bg-white shadow-md rounded my-6">
                        <div class="col-auto documentos w-1/2 mx-auto py-2">
                            <h3 class="text-center">
                                {{ $contenido->titulo }}
                            </h3>
                            <p class="py-5">
                                {{ $contenido->descripcion }}
                            </p>
                            <div class="flex">
                                <div class="w-1/2">
                                    <strong class="mb-3">Fecha inicio</strong><br>
                                    {{ $contenido->fecha_inicio}}
                                </div>
                                <div class="w-1/2">
                                    <strong class="mb-3">Fecha fin</strong><br>
                                    {{ $contenido->fecha_fin}}
                                </div>
                            </div>
                            <div class="flex">
                                <div class="w-1/2">
                                    <strong class="mb-3">Hora inicio</strong><br>
                                    {{ $contenido->hora_inicio}}
                                </div>
                                <div class="w-1/2">
                                    <strong class="mb-3">Hora fin</strong><br>
                                    {{ $contenido->hora_fin}}
                                </div>
                            </div>
                        </div>
                        <div class="w-1/2 mx-auto icons py-4">
                            <div class="grid md:grid-cols-2 grid-cols-2 gap-4">    
                                <div class="col-auto">
                                    <a href="{{ route('detalle.panelistas-actividad', $contenido->id) }}">
                                        <img src="/images/orador_con-fondo.svg" alt="Perfil" class="block mx-auto m-auto">
                                        <span>Panelistas</span>
                                    </a> 
                                </div>                                                
                                <div class="col-auto">
                                    <a href="{{ route('detalle.materiales-actividad', $contenido->id) }}">
                                        <img src="/images/materiales_con-fondo.svg" alt="Eventos" class="block m-auto">
                                        <span>Materiales</span>
                                    </a>
                                </div>
                                                                
                            </div> 
                        </div> 
                    </div>
                @endforeach
            @else
            
                <h1 class="text-left  px-5">
                    No hay actividades adicionales
                </h1>
                
            @endif                
        </div>    
            
        @if ($datos > 0)
            <div class="pager">
                {{ $contenidos->links() }}
            </div>
        @endif 
    
        <div class="py-5"></div>
        <button onclick="goBack()" class="verde-lima-bg text-white py-2 px-4 border border-gray-400 rounded shadow">
            <img src="/images/back-arrow-svgrepo-com.svg" alt="" class="inline-flex w-4 mr-2">
            Volver
        </button>
        <div class="py-5"></div>

        <script>
            function goBack() {
                window.history.back();
            }
        </script> 
    </div>

           

</x-app-layout>




