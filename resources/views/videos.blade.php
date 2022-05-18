<x-app-layout>
    <x-slot name="header">        
    </x-slot>

    <div class="row pt-20">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Videos</h2>
            </div>           
        </div>
    </div>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($contenidos as $contenido)
            <div class="col-auto">
                <iframe src="{{ $contenido->url }}" frameborder="0" allowfullscreen></iframe>
                
                <a href="{{ $contenido->url }}" target="_blank" rel="noopener noreferrer" style="text-align: center;display:block;z-index:3">{{ $contenido->titulo }}</a>
            </div>
        @endforeach
    </div>        

</x-app-layout>