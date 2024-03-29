@extends('layouts.admin')

@section('title', 'Admin Eventos')
    
@section('content')
    @if(Auth::user()->hasRole('admin')) 
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <h1 class="text-left py-20">
            Usuarios Administrativos
        </h1>
        <div class="w-full block">
            <a class="verde-lima-bg text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow" href="{{ route('adminusers.create') }}"> Insertar nuevo</a>
        </div>
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
            <table class="w-full my-5 border-solid border-gray-700">
                <tr class="text-center">
                    <th class="py-3">ID</th>
                    <th class="py-3">Nombre</th>
                    <th class="py-3">Correo</th>
                </tr>
                @foreach ($contenidos as $key => $value)
                <tr class="text-center">
                    <td class="py-3">{{ $value->id }}</td>
                    <td class="py-3">{{ $value->name }}</td>
                    <td class="py-3">{{ $value->email }}</td>
                    <td class="py-3">
                        <form action="{{ route('adminusers.destroy',$value->user_id) }}" method="POST">                                                          
                            @csrf
                            @method('DELETE')      
                            <button type="submit" class="azul-andes-bg text-white py-2 px-4 border border-white-400 rounded shadow">Borrar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>  
             

        </div>


    </div>


    @endif
@endsection
    

  