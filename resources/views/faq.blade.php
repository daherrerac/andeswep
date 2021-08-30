<x-app-layout>
    <x-slot name="header">        
    </x-slot>

    <div class="row">
        <div class="col-lg-12 my-5">
            <div class="text-center">
                <h2>FAQ</h2>
            </div>           
        </div>
    </div>
     
    
    <div class="max-w-screen-md mx-auto  px-2" x-data="{selected:null}">
        <ul class="shadow-box">
            @foreach ($contenidos as $contenido)
            <li class="relative border-b border-gray-200">
                <button type="button" class="azul-andes-bg w-full px-8 py-6 text-center" @click="selected !== {{ $contenido->id }} ? selected = {{ $contenido->id }} : selected = null">
                    <div class="flex items-center justify-between">
                        <span class="block w-full font-bold text-center text-white">{{ $contenido->titulo }}</span>
                        <span class="ico-plus"></span>
                    </div>
                </button>
    
                <div class="relative overflow-hidden transition-all max-h-0 duration-700" style="" x-ref="container{{ $contenido->id }}" x-bind:style="selected == {{ $contenido->id }} ? 'max-height: ' + $refs.container{{ $contenido->id }}.scrollHeight + 'px' : ''">
                    <div class="p-6">
                        <p>{{ $contenido->respuesta }}</p>
                    </div>
                </div>    
            </li>
            @endforeach
        </ul>
    </div> 
    
        
</x-app-layout>




