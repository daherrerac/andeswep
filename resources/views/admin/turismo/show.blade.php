@extends('layouts.admin')

@section('title', 'Evento')
    
@section('content')

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="py-10"></div>     
    <div class="icon-container shadow-xl">             
        <div class="w-100  md:w-1/2 mx-auto">
            <img src="{{ asset("/storage/".$turismo->path) }}" alt="{{ $turismo->titulo }}" class="block mx-auto p-2">
            <div>
                <div class="text-center">
                    <h3>                                
                        {{ $turismo->titulo }}
                    </h3>
                </div>
            </div>
            <div class="">
                <div class="mx-auto text-center pb-5">
                    
                    <a href="{{ $turismo->link }}" style="font-size: 80%"> {{ $turismo->link }}</a>
                    <p class="text-left my-5 px-5"> {!! $turismo->descripcion !!} </p>
                    
                </div>
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

