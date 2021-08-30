@extends('layouts.admin')

@section('title', 'Eventos Edit')
    
@section('content')
    @if(Auth::user()->hasRole('admin'))   


    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Hay problemas con los datos ingresados</strong><br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1 class="text-left pt-20 pb-10">
            Editar pregunta
        </h2>

        <div class="bg-white shadow-md">
            

            <form class="w-full my-5 px-5 py-5" action="{{ route('fitness.update',$fitness->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="w-full">
                    <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Titulo:
                    </label>
                </div>

                <div class="w-full">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="inline-full-name" name="titulo" value="{{ $fitness->titulo }}" class="form-control" placeholder="Titulo">
                </div>
                
                
                <div class="w-full">
                    <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name2">
                        Descripción:
                    </label>
                </div>
                <div class="w-full">
                    <textarea class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="inline-full-name2" name="descripcion"  cols="30" rows="10" >{{ $fitness->descripcion }}</textarea>                                        
                </div>
                
                <div class="md:flex md:items-center">
                    <div class="w-full py-10">
                        <button class="shadow verde-lima-bg  focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                            Guardar
                        </button>
                    </div>
                </div>
                
                
            </form>

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
             
    
    @endif
@endsection





