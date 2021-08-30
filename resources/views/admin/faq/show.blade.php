@extends('layouts.admin')

@section('title', 'Evento')
    
@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="py-10"></div>  
        <h2> Preguntas</h2>        
            <div class="row">
                <div class="my-5">
                    <div class="text-center">
                        
                    </div>
                    
                </div>
            </div>

            <div class="w-1/2 mx-auto">
                <div>
                    <div class="text-center">
                        <h3>
                            <strong>Titulo:</strong>
                            {{ $faq->titulo }}
                        </h3>
                    </div>
                </div> 
                <div class="">
                    <div class="mx-auto text-center ">
                        
                        <p class="text-left my-5"> {{ $faq->respuesta }} </p>
                        
                    </div>
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