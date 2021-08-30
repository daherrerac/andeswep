@extends('layouts.admin')

@section('title', 'Evento')
    
@section('content')  

    @if(Auth::user()->hasRole('admin'))

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-left pt-20 pb-10">
                Editar panelista
            </h1>
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

            <div class="bg-white shadow-md">
                <form class="w-full my-5 px-5 py-5" action="{{ route('panelistas.update',$panelista->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="w-full">
                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
                            Nombre:
                        </label>
                    </div>

                    <div class="w-full">
                        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="inline-full-name" name="nombre" type="text" placeholder="Ej: Juan Botero" value="{{ $panelista->nombre }}">
                    </div>
                     
                    <div class="my-4"></div>
                      
                    <div class="w-full">
                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name2">
                            Resúmen:
                        </label>
                    </div>

                    <div class="w-full">
                        <textarea class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="inline-full-name2" name="resumen"  cols="30" rows="5">{{ $panelista->resumen }}</textarea>                      
                    </div>

                    <div class="my-4"></div>

                    <div class="w-full">
                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-nameh">
                            Hoja de vida:
                        </label>
                    </div>                       
                        
                    <div class="w-full">
                        <textarea class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="inline-full-nameh" name="hv"  cols="30" rows="7">{{ $panelista->hv }}</textarea>                      
                    </div>

                    <div class="w-full">
                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
                            Redes sociales
                        </label>
                    </div>

                    <div class="w-full">
                        <div class="flex">
                            <div class="w-1/4 mr-2">
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 mb-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="inline-full-name" name="ig" type="text" placeholder="Instagram" value="{{ $panelista->ig }}">
                            </div>
                            <div class="w-1/4 mr-2">
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 mb-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="inline-full-name" name="fb" type="text" placeholder="Facebook" value="{{ $panelista->fb }}">
                            </div>
                            <div class="w-1/4 mr-2">
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 mb-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="inline-full-name" name="tw" type="text" placeholder="Twitter" value="{{ $panelista->tw}}">
                            </div>
                            <div class="w-1/4">
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 mb-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="inline-full-name" name="li" type="text" placeholder="Linkedin" value="{{ $panelista->li }}">
                            </div>
                        </div>
                    </div>
                      
                    <div class="w-full">
                        <div class="flex">
                            <div class="w-1/2 mr-2">
                                <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
                                    Correo electrónico:
                                </label>
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 mb-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="inline-full-name" name="mail" type="mail" placeholder="Correo" value="{{ $panelista->mail }}"> 
                            </div>
                            <div class="w-1/2">
                                <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
                                    Teléfono:
                                </label>
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="inline-full-name4" name="telefono" type="text" placeholder="12345 ext(098)" value="{{ $panelista->telefono }}">
                            </div>
                        </div>                        
                    </div>
                                                                                                                                  
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
    @endif

@endsection




    
              





