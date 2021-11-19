<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    <div class="py-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bienvenida">
                    <h1 class="text-center pt-5">
                        Be Andes!
                    </h1>
                </div>
                @if((Auth::check()))
                <div class="app-fondo overflow-hidden">        
                    <div class="max-w-7xl mx-auto sm:px-10 lg:px-8 mt-5">                                            
                        
                        <div class="md:w-2/3 w-full mx-auto overflow-hidden">
                            <div class="shadow-xl text-center">             
                                <div class="grid grid-cols-3 gap-4 app-menu">
                                    <div class="col-auto">
                                        <a href="{{ route('profile.show') }}">
                                            <img src="/images/user.png" alt="Perfil" class="block mx-auto mt-5 sm-icon">
                                            <span>Perfil</span>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <a href="eventos">
                                            <img src="/images/eventos.png" alt="Eventos" class="block mx-auto mt-5 sm-icon">
                                            <span>Eventos</span>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <a href="/documentos">
                                            <img src="/images/informacion.png" alt="Información" class="block mx-auto mt-5 sm-icon">
                                            <span>Información</span>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <a href="/programacion">
                                            <img src="/images/calendario.png" alt="Perfil" class="block mx-auto mt-5 sm-icon">
                                            <span>Programación</span>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <a href="/videos">
                                            <img src="/images/videos.png" alt="Eventos" class="block mx-auto mt-5 sm-icon">
                                            <span>Videos</span>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <a href="/clima">
                                            <img src="/images/clima.png" alt="Información" class="block mx-auto mt-5 sm-icon">
                                            <span>Clima</span>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <a href="/fitness">
                                            <img src="/images/fitness.png" alt="Perfil" class="block mx-auto mt-5 sm-icon">
                                            <span>Fitness <br> Uniandes</span>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <a href="/turismo">
                                            <img src="/images/turismo.png" alt="Eventos" class="block mx-auto mt-5 sm-icon">
                                            <span>Turismo</span>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <a href="/faq">
                                            <img src="/images/faq.png" alt="Información" class="block mx-auto mt-5 sm-icon">
                                            <span>FAQ</span>
                                        </a>
                                    </div>
                
                                    <div class="col-auto">
                                        <a href="/galeria">
                                            <img src="/images/fotos.png" alt="Información" class="block mx-auto mt-5 sm-icon">
                                            <span>Fotos</span>
                                        </a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="pb-5"></div>
                </div>
                @endif
            </div>
        </div>
    </div>
    @if(Auth::user()->hasRole('admin'))
        <div class="menu-admin">
            <a href="{{ route('admin') }}">
                <img src="/images/admin.svg" alt="">
            </a>
        </div>       
    @endif 

    
    
</x-app-layout>
