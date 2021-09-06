@extends('layouts.admin')

@section('title', 'Admin')
    
@section('content')
    @if(Auth::user()->hasRole('admin'))  
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-center py-20">
            Ajustes generales
        </h1>

        <div class="grid grid-cols-2 gap-2  py-2">
            <div class="col-auto">
                <p>
                    <a href=" {{url('/users/import')}} ">
                        <strong>Dar de alta usuarios en Be-Andes</strong>
                        <img src="/images/user.png" alt="" class="w-24 mt-5">
                    </a>
                </p>
            </div>
            <div class="col-auto">
                <p>
                    <a href=" {{url('/users/evento')}} ">
                        <strong>Dar de alta usuarios en un evento</strong>
                        <img src="/images/user.png" alt="" class="w-24 mt-5">
                    </a>
                </p>
            </div>
            <div class="col-auto">
                <p>
                    <a href="{{url('admin/adminusers')}}">
                        <strong>
                            Agregar Administrador
                        </strong>
                        <img src="/images/add-user.svg" alt="" class="w-24 mt-5">
                    </a>
                </p>
            </div>            
        </div>
        
        <div class="grid grid-cols-2">
            <div class="col-auto">
                <p>
                    <a href="/archivos/usuarios.xlsx">
                        <strong>
                            Archivo para subir usuarios a B-Andes
                        </strong>
                        <img src="/images/file_type_excel_icon_130611.svg" alt="" class="w-10 mt-5">
                    </a>
                </p>                
            </div>
            <div class="col-auto">                
                <p>
                    <a href="/archivos/usuarios-evento.xlsx">
                        <strong>
                            Archivo para subir usuarios a eventos
                        </strong>
                        <img src="/images/file_type_excel_icon_130611.svg" alt="" class="w-10 mt-5">
                    </a>
                </p>
            </div>
        </div>
        

    </div>                      
        
    @endif
@endsection
    
    
