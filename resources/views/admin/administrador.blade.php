@extends('layouts.admin')

@section('title', 'Admin')
    
@section('content')
    @if(Auth::user()->hasRole('admin'))                        
        <h1 class="text-center py-20">
            Seleccione una de las opciones del menú para empezar a editar
        </h1>
    @endif
@endsection
    
    
