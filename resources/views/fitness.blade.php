<x-app-layout>
    <x-slot name="header">        
    </x-slot>

    <div class="row pt-20">
        <div class="col-lg-12 my-5">
            <div class="text-center">
                <h2>Fitness Uniandes</h2>
                <h3>Selecciona la actividad en la que deseas participar</h3>
            </div>           
        </div>
    </div>
     
    
    <div class="max-w-screen-md mx-auto  px-2" >
        <div class="md:w-2/3 w-2/3 block mx-auto">
            @if ($message = Session::get('success'))                
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                    <div class="flex">
                      <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                      <div>                        
                        <p class="text-sm">{{ $message }}</p>
                      </div>
                    </div>
                </div>
            @endif
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach ($contenidos as $contenido)
                    <div class="col-auto">
                        <p class="text-center">
                            <span class="mx-3">Título evento: {{ $contenido->titulo }} </span>
                        </p>
                        <a href="{{ route ('fitness.guardar', $contenido->id)}}">
                            <img src="{{ asset("/storage/".$contenido->path) }}" alt="{{ $contenido->titulo }}" class="block mx-auto p-2">
                        </a>
                        
                        <p class="mb-5"><span>{{ \Str::limit($contenido->descripcion, 50) }}</span></p>
                        {{-- <p>
                            <form action="{{ route('fitness.destroy',$contenido->id) }}" method="POST" class="block mx-auto my-5 text-center">
                        
                                <a class="azul-andes-fondo  text-white  py-2 px-4 border border-gray-400 rounded shadow" href="{{ route('fitness.show',$value->id) }}">Mostrar</a>    
                                <a class="bg-white  text-gray-800  py-2 px-4 border border-gray-400 rounded shadow" href="{{ route('fitness.edit',$value->id) }}">Editar</a>   
                                @csrf
                                @method('DELETE')      
                                <button type="submit" class="naranja-app-fondo text-white py-1 px-4 border border-white-400 rounded shadow">Borrar</button>
                            </form>
                        </p> --}}
                        <div class="py-5"></div>
                        <p class="text-center">
                            <strong class="py-3">Tipo de evento</strong>
                            @if ( $contenido->tipo == "gps" )
                                <img src="/images/mapas-de-google.svg" alt="" class="block mx-auto w-12">
                            @else
                                <img src="/images/ejes-de-coordenadas.svg" alt="" class="block mx-auto w-12">
                            @endif
                        </p>
                        
                    </div>
                @endforeach
                
            </div>
            <p class="md:w-1/2 w-full text-center mx-auto pt-10">
                <a href="/detalle/fitness" class="azul-andes-bg text-white py-2 px-4 ml-2 border border-white-400 rounded shadow">Marca personal</a>
            </p>
        </div>
        
    </div> 
    
        
</x-app-layout>




