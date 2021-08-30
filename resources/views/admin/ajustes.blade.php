@extends('layouts.admin')

@section('title', 'Admin')
    
@section('content')
    @if(Auth::user()->hasRole('admin'))  
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-center py-20">
            Ajustes generales
        </h1>

        <p>
            <a href=" {{url('/users/import')}} ">
                <strong>Dar de alta usuarios en la WebApp</strong>
                <img src="/images/user.png" alt="" class="w-24 mt-5">
            </a>
        </p>
        <p class="pt-10">
            <a href=" {{url('/users/evento')}} ">
                <strong>Dar de alta usuarios en un evento</strong>
                <img src="/images/user.png" alt="" class="w-24 mt-5">
            </a>
        </p>
        <p class="pt-10">
            <a href="{{url('admin/adminusers')}}">
                <strong>
                    Agregar Administrador
                </strong>
                <img src="/images/add-user.svg" alt="" class="w-24 mt-5">
            </a>
        </p>

    </div>                      
        
    @endif
@endsection
    
    
