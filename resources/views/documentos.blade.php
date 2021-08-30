<x-app-layout>


    <div class="py-20"></div>    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-2">
            @if ($contenidos != '' || $contenidos != null )
    
                @foreach ($contenidos as $contenido)
                    <div class="col-auto documentos w-1/2 mx-auto">
                        <a href="{{ route ('detalle.documento', $contenido->id)}}">
                            <img src="{{ asset("/storage/".$contenido->path) }}" alt="{{ $contenido->titulo }}" class="block p-2 mx-auto">
                        </a>
                        <div class="figcaption text-center">
                            {{ $contenido->titulo }}
                        </div>
                    </div>
                @endforeach
                
            @endif                
        </div>    
            
        @if ($contenidos != '' || $contenidos != null )
            <div class="pager">
                {{ $contenidos->links() }}
            </div>
        @endif 
    
    </div>

           

</x-app-layout>




