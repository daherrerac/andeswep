<x-app-layout>


    <div class="py-20"></div>    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-2">
            @if ($datos > 0)
    
                @foreach ($contenidos as $contenido)
                    <div class="col-auto documentos w-1/2 mx-auto">
                        <a href="{{ route ('detalle.documento-actividad', $contenido->id)}}">
                            <img src="{{ asset("/storage/".$contenido->path) }}" alt="{{ $contenido->titulo }}" class="block p-2 mx-auto">
                        </a>
                        <div class="figcaption text-center">
                            {{ $contenido->titulo }}
                        </div>
                    </div>
                @endforeach
            @else
            
                <h1 class="text-left  px-5">
                    No hay material asociado
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




