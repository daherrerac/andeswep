@extends('layouts.admin')

@section('title', 'Admin Eventos')
    
@section('content')
  @if(Auth::user()->hasRole('admin'))

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
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="pt-10"></div>
      <h2 class="text-left py-5">Añadir nuevo video</h2>
        
    <div class="bg-white shadow-md">
    <form class="w-full my-5 px-5 py-5" action="{{ route('vmaterial.store') }}" method="POST">
      @csrf
      <div class="py-3"></div>
      <div class="w-full">
        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
            Titulo:
        </label>
      </div>
      <div class="w-full">
        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="inline-full-name"  name="titulo" type="text" placeholder="Ingresar título" value={{ old('titulo') }}>
      </div>
      <div class="py-3"></div>
      <div class="w-full">
        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name2">
            Link:
        </label>
      </div>
      <div class="w-full">
        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-100" id="inline-full-name2" name="url" type="text"  placeholder="Ingresar link" value={{ old('url') }}>
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
  @endif    

@endsection