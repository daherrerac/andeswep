<x-app-layout>
    <x-slot name="header">
        
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="py-10"></div>
        <div class="bg-white shadow-md rounded py-6">           
            <div class="w-100  md:w-1/2 mx-auto">
                <img src="{{ asset("/storage/" .$detalle->path) }}" alt="{{ $detalle->titulo }}" class="block mx-auto p-2">
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
                <div class="mx-auto text-center my-5">
                    {{-- <a href="{{ route('comentarios.documentos', $detalle->id) }}" class="shadow naranja-app-fondo hover:bg-verde-andes text-white font-bold py-2 px-4 w-1/2  items-center rounded text-center block mx-auto"> Comentarios </a> --}}
                </div>
            </div>
        </div>
        <div class="py-3"></div>
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