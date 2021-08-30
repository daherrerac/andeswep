@extends('layouts.admin')

@section('title', 'Admin Eventos')
    
@section('content')

    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         
        
            
                
        <h2 class="py-20"> Video</h2>
                
            
        

        <div class="w-full mx-auto">
            
            <div class="text-center">
                <h3 class="py-3">
                    <strong>Titulo:</strong>
                    {{ $video->titulo }}
                </h3>
            </div>
        
        
            <div class="mx-auto text-center">
                <h4 class="py-3">
                    <strong>Url:</strong>
                    <span>{{ $video->url }}</span>
                </h4>
                <iframe src="{{ $video->url }}" frameborder="0" class="block mx-auto"></iframe>
            </div>
            
        </div>
        

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
