@extends('layouts.admin')

@section('title', 'Admin')
    
@section('content')

    @if(Auth::user()->hasRole('admin'))

        @if($errors->any())
            <div class="mt-20">
                <strong class="text-red-500 pt-20">Hay problemas con los datos ingresados</strong><br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="pt-10"></div>
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1 class="text-left py-5">
                Panelistas
            </h1>
            <div class="bg-white shadow-md">
                <form class="w-full my-5 px-5 py-5" action="{{ url('/admin/panelistaevento/add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="w-full">
                        <label class="block text-gray-500 font-bold md:text-left  md:mb-3 pr-4 text-xl">Evento</label>
                    </div>

                    <div class="w-full">
                        <label class="block text-gray-500 font-bold md:text-left  md:mb-3 pr-4">Seleccione el evento relacionado</label>
                        
                        <input class="typeahead" type="text" id="search" name="search" placeholder="Seleccione un evento de la lista" class="form-control" />
                        <input type="text" id="search2" name="evento" placeholder="Id Evento" class="form-control identificador" />  
                    </div>
                    <div class="my-5"></div>

                    <div class="w-full">
                        <label class="block text-gray-500 font-bold md:text-left  md:mb-3 pr-4 text-xl">Panelista</label>
                    </div>

                    <div class="w-full">
                        <label class="block text-gray-500 font-bold md:text-left  md:mb-3 pr-4">Seleccione el panelista</label>                        
                        <input class="typeahead" type="text" id="search3" name="search" placeholder="Seleccione un panelista" class="form-control" />
                        <input type="text" id="search4" name="panelista" placeholder="Id Evento" class="form-control identificador" />  
                    </div>
                    <div class="my-5"></div>


                    <div class="w-full">
                        <label class="block text-gray-500 font-bold md:text-left  md:mb-3 pr-4 text-xl">¿Es organizador?</label>
                    </div>

                    <div class="md:w-2/3">
                        <label class="inline-flex items-center">
                          <input type="radio" class="form-radio" name="organizador" value="1">
                          <span style="margin-left: 1.25rem;">Sí</span>
                        </label>
                        <label class="inline-flex items-center ml-6">
                          <input type="radio" class="form-radio" name="organizador" value="0">
                          <span style="margin-left: 1.25rem;">No</span>
                        </label>
                    </div>


                    <div class="py-3"></div>
                    
                                                                                                                                                                                           
                    
        
                    <div class="md:flex items-center">                      
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


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
        </script>
        <script>
            var route = "{{ url('/autocomplete-search') }}";
            var idevento;
            $('#search').typeahead({
                source: function (query, process) {
                    return $.get(route, {
                        query: query
                    }, function (data) {
                        return process(data);
                    });
                },
                displayText: function(item) {
                    return item.titulo
                },
                afterSelect: function(item) {
                    idevento = item.id;
                    $( "#search2" ).val(idevento);
                }
            });
            var route2 = "{{ url('/autocomplete-search-panel') }}";
            var idevento2;
            $('#search3').typeahead({
                source: function (query, process) {
                    return $.get(route2, {
                        query: query
                    }, function (data) {
                        return process(data);
                    });
                },
                displayText: function(item) {
                    return item.nombre
                },
                afterSelect: function(item) {
                    idevento2 = item.id;
                    $( "#search4" ).val(idevento2);
                }
            });
            
        </script>

    @endif
    


@endsection