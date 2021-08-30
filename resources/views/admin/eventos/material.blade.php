@extends('layouts.admin')

@section('title', 'Evento')
    
@section('content')

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="py-10"></div>
        <div class="bg-white  overflow-hidden shadow-xl sm:rounded-lg ">        
            @foreach ($contenidos as $contenido)

            <div class="grid grid-cols-5 gap-2 listado py-5">
                <div class="col-auto">
                    
                    <div class="block mx-auto">
                        <strong class="block text-center mt-5">{{$contenido->titulo}} </strong>
                    </div>
                    
                </div>
                <div class="col-auto">
                    
                    <div class="block mx-auto">                        
                        <img src="{{ asset("/storage/".$contenido->path) }}" alt="{{ $contenido->titulo }}" class="block mx-auto p-2">
                    </div>
                    
                </div>
                <div class="col-span-2">
                    
                    <div class="block mx-auto">                        
                        <p>
                            {{$contenido->descripcion}}
                        </p>
                    </div>
                    
                </div>
                <div class="col-auto">
                    
                    <div class="block mx-auto">                        
                        <a href="{{$contenido->link}} "><img src="/images/download-flat.png" alt="" class="mt-3"></a>
                    </div>
                    
                </div>
                                
            </div>
        
            
                                    
            @endforeach
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
@endsection



