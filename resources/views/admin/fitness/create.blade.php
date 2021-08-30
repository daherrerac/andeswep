@extends('layouts.admin')

@section('title', 'Admin Eventos')
    
@section('content')
    @if(Auth::user()->hasRole('admin'))  
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">      

      <h1 class="text-left py-20">
        Nuevo evento Fitness
      </h1>
      @if($errors->any())
          <div class="alert alert-danger">
              <strong>Hay problemas con los datos ingresados</strong><br><br>
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>        
      @endif

      <div class="bg-white shadow-md">
        <form class="w-full my-5 px-5 py-5" action="{{ route('fitness.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          
          <div class="w-full">
            <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
                Titulo:
            </label>
          </div>

          <div class="w-full">
            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="inline-full-name" name="titulo" type="text" placeholder="Ingresar título" value={{ old('titulo') }}>
          </div>
          <div class="py-3"></div>
          <div class="w-full">
            <label class="block text-gray-500 font-bold md:text-left  md:mb-3 pr-4">Tipo de evento</label>
            <select name="tipo" class="bg-transparent  appearance-none outline-none">
              <option value="0" disabled selected> Seleccione una modalidad de la lista</option>
              <option value="gps">Desplazamiento (GPS)</option>
              <option value="acc">Indoor (Movimiento)</option>
            </select>
          </div>
          <div class="py-3"></div>
          <div class="w-full">
            <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name2">
                Descripción:
            </label>
          </div>

          <div class="w-full">
            <textarea class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="inline-full-name2" name="descripcion"  cols="30" rows="5" maxlength="100">{{ old('descripcion') }}</textarea>                      
          </div>
          
          
          
          <div class="w-full">
            <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name3">
                Imagen:
            </label>
          </div>

          <div class="w-full">
            <input type="file" name="imagen" placeholder="Escoger imagen" id="imagen">
              @error('imagen')
                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
              @enderror
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



    

    

