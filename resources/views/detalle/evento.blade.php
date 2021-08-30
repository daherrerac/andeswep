<x-app-layout>
    

    <div class="py-10"></div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="h-auto overflow-hidden">                       
            <div class="w-100  md:w-1/2 mx-auto">
                <img src="{{ asset("/storage/".$detalle->path) }}" alt="{{ $detalle->titulo }}" class="block mx-auto p-2">
                <div>
                    <div class="text-center">
                        <h3>                                
                            {{ $detalle->titulo }}
                        </h3>
                    </div>
                </div>
                <div class="">
                    <div class="mx-auto text-center ">
                        
                        <a href="{{ $detalle->link }}" style="font-size: 80%"> {{ $detalle->link }}</a>
                        <p class="text-left my-10 px-5"> {!! $detalle->descripcion !!} </p> 
                        
                    </div>
                </div>
            </div> 

            <div class="w-2/3 mx-auto icons">
                <div class="grid md:grid-cols-3 grid-cols-2 gap-4">    
                    <div class="col-auto">
                        <a href="{{ route('detalle.panelistas-evento', $detalle->id) }}">
                            <img src="/images/orador_con-fondo.svg" alt="Perfil" class="block mx-auto m-auto">
                            <span>Panelistas</span>
                        </a> 
                    </div>                
                    <div class="col-auto">
                        <a href="{{ route('detalle.usuarios-evento', $detalle->id) }}">
                            <img src="/images/participantes_con-fondo.svg" alt="Perfil" class="block m-auto ">
                            <span>Participantes</span>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('detalle.materiales', $detalle->id) }}">
                            <img src="/images/materiales_con-fondo.svg" alt="Eventos" class="block m-auto">
                            <span>Materiales</span>
                        </a>
                    </div>
                    {{-- <div class="col-auto">
                        <a href="clima">
                            <img src="/images/feedback_con-fondo.svg" alt="Información" class="block m-auto">
                            <span>Opiniones</span>
                        </a>
                    </div> --}}
                    <div class="col-auto">
                        <a href="{{ route('detalle.programacion-detalle', $detalle->id) }}">
                            <img src="/images/calendario.png" alt="Información" class="block m-auto">
                            <span>Programación</span>
                        </a>
                    </div>
                    <div class="col-auto">
                        {{-- <a href="{{ route('detalle.descripcion-evento', $detalle->id) }}">
                            <img src="/images/programa_con-fondo.svg" alt="Información" class="block mx-auto mt-5 sm-icon">
                            <span>Descripción</span>
                        </a> --}}
                    </div>
                    
                </div> 
            </div> 
                        
        </div>

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