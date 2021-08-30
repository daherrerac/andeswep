<x-app-layout>
    <x-slot name="header">
        
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="py-5"></div>
        <div class="bg-white shadow-md rounded py-6">          
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
                        <p class="text-left my-5 px-5"> {!! $detalle->descripcion !!} </p>
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</x-app-layout>