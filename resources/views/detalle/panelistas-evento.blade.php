<x-app-layout>
    
    <div class="max-w-7xl mx-auto sm:px-10 lg:px-8 pt-20">
        <div class="bg-white  overflow-hidden shadow-xl sm:rounded-lg ">
            @if ($datos > 0)
                @foreach ($contenidos as $contenido)

                <div class="grid grid-cols-5 gap-2 listado py-5">
                    <div class="col-auto">
                        @if ($contenido->organizador == 1)
                            <div class="block mx-auto">
                                <span class="block text-center mt-5">Organizador</span>
                            </div>
                        @endif
                    </div>
                    <div class="col-auto">
                        <img src="{{ asset("/storage/".$contenido->path) }}" alt="{{ $contenido->nombre }}" class="block mx-auto p-2 rounded">
                    </div>
                    <div class="col-span-2 ">
                        <strong class="block verde-andes mt-5">{{ $contenido->nombre }}</strong>                    
                    </div>
                    <div class="col-auto my-auto text-right">
                        <a href="{{ route ('detalle.panelista', $contenido->id)}}" class="block mx-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 verde-andes block mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div> 
                </div>
            
                
                                        
                @endforeach
            @else
                <h1 class="text-left py-10 px-5">
                    No hay panelistas registrados en el evento o actividad
                </h1>
            @endif

            <div class="row nav-pagination">
                <div class="offset-lg-5 col-lg-1 col-2 offset-4 ">
                    {{-- {{ $contenido->links() }} --}}
                </div>
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




        
</x-app-layout>




