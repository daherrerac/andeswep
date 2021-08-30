@extends('layouts.admin')

@section('title', 'Admin')
    
@section('content')
    @if(Auth::user()->hasRole('admin'))  
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="py-20">
            Importar Usuarios
        </h1>

        @if ($message = Session::get('success'))                
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-10 shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>                        
                    <p class="text-sm">{{ $message }}</p>
                    </div>
                </div>
            </div>
        @endif
        
        <div class="bg-white shadow-md rounded my-6">            
            <form class="w-full my-5 px-5 py-5" action="/users/import" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="w-full">
                    <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name3">
                        Archivo de excel con usuarios a registrar:
                    </label>
                </div>
                <div class="py-5"></div>
                <input type="file" name="file">

                <div class="md:flex items-center">                      
                    <div class="w-full py-10">
                      <button class="shadow verde-lima-bg  focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                        Importar
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
    
    
