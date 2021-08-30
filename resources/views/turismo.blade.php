<x-app-layout>
    <x-slot name="header">        
    </x-slot>



    <div class="max-w-7xl mx-auto sm:px-10 lg:px-8  pt-20">
        <div class="bg-white  overflow-hidden shadow-xl sm:rounded-lg py-3">
        
            @foreach ($contenidos as $contenido)

            <div class="grid grid-cols-4 gap-4 listado">
                <div class="col-auto">
                    <img src="{{ asset("/storage/".$contenido->path) }}" alt="{{ $contenido->titulo }}" class="block mx-auto p-2 rounded">
                </div>
                <div class="col-span-2 ">
                    <strong class="block verde-andes">{{ $contenido->titulo }}</strong>
                    <span class="block py-3">{!! \Str::limit($contenido->descripcion, 100) !!}</span>
                </div>
                <div class="col-auto my-auto">
                    <a href="{{ route ('detalle.turismo', $contenido->id)}}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 verde-andes" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        
            
                                    
            @endforeach
            <div class="row nav-pagination">
                <div class="offset-lg-5 col-lg-1 col-2 offset-4 ">
                    {{-- {{ $contenido->links() }} --}}
                </div>
            </div>
        </div>
    </div>




           

</x-app-layout>




