@extends('layouts.admin')

@section('title', 'Admin Panelistas')
    
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
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-left py-5">
                Panelistas
            </h1>

            <div class="bg-white shadow-md">
                <form class="w-full my-5 px-5 py-5" action="{{ route('panelistas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="w-full">
                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
                            Nombre:
                        </label>
                    </div>

                    <div class="w-full">
                        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="inline-full-name" name="nombre" type="text" placeholder="Ej: Juan Botero">
                    </div>
                    
                    <div class="py-3"></div>
                    
                    <div class="w-full flex">
                        <div class="md:w-1/3">
                            <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name3">
                                Foto:
                            </label>
                        </div> 
                        <div class="md:w-2/3">
                            <input type="file" name="profile_picture" placeholder="Escoger imagen" id="imagen">
                              @error('profile_picture')
                                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                        </div>                       
                    </div>

                    <div class="w-full">
                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name2" >
                            Resúmen:
                        </label>
                    </div>  
                    
                    <div class="w-full">                        
                        <textarea class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="inline-full-name2" name="resumen"  cols="30" rows="5" maxlength="100"></textarea>                                              
                    </div>
                    
                    <div class="w-full">
                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-nameh">
                            Hoja de vida:
                        </label>
                    </div>

                    <div class="w-full">                        
                        <textarea class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="inline-full-nameh" name="hv"  cols="30" rows="10"></textarea>                                              
                    </div>

                    <div class="py-3"></div>

                    <div class="w-full">
                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
                            Redes sociales
                        </label>
                    </div>

                    <div class="w-full">
                        <div class="flex">
                            <div class="w-1/4 mr-2">
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 mb-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="inline-full-name" name="ig" type="text" placeholder="Instagram">
                            </div>
                            <div class="w-1/4 mr-2">
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 mb-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="inline-full-name" name="fb" type="text" placeholder="Facebook">
                            </div>
                            <div class="w-1/4 mr-2">
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 mb-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="inline-full-name" name="tw" type="text" placeholder="Twitter">
                            </div>
                            <div class="w-1/4">
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 mb-2 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="inline-full-name" name="li" type="text" placeholder="Linkedin">
                            </div>
                        </div>
                    </div>
                    
                    

                    <div class="w-full">
                        <div class="flex">
                            <div class="w-1/2 mr-2">
                                <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
                                    Correo electrónico:
                                </label>
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2  px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="inline-full-name" name="mail" type="mail" placeholder="Correo">                  
                            </div>
                            <div class="w-1/2">
                                <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
                                    Teléfono:
                                </label>
                                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="inline-full-name4" name="telefono" type="text" placeholder="12345 ext(098)">
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
        </div>

    @endif


@endsection

    

