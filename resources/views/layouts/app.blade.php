<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" sizes="57x57" href="/images/icons/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/images/icons/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/images/icons/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/images/icons/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/images/icons/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/images/icons/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/images/icons/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/images/icons/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/images/icons/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/images/icons/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/images/icons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/images/icons/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/images/icons/favicon-16x16.png">
        <link rel="manifest" href="/images/icons/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/images/icons/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" href="/weather-icons/css/weather-icons.min.css">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />
        
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <div id="myNav" class="overlay">                
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <div class="overlay-content">
                  
                    @if(Auth::user())
                        <a href="/eventos" >
                            <img src="/images/eventos.png" alt="clima" class="mx-3">
                            Eventos
                        </a>
                        <a href="/clima" >
                            <img src="/images/informacion.png" alt="clima" class="mx-3">
                            Información
                        </a>
                        <a href="/programacion" >
                            <img src="/images/calendario.png" alt="clima" class="mx-3">
                            Programación
                        </a>
                        <a href="/galeria" >
                            <img src="/images/fotos.png" alt="clima" class="mx-3">
                            Fotos
                        </a>
                        <a href="/videos" >
                            <img src="/images/videos.png" alt="clima" class="mx-3">
                            Videos
                        </a>
                        <a href="/clima" >
                            <img src="/images/clima.png" alt="clima" class="mx-3">
                            Clima
                        </a>
                        <a href="/fitness" >
                            <img src="/images/fitness.png" alt="clima" class="mx-3">
                            Fitness
                        </a>
                        <a href="/turismo" >
                            <img src="/images/turismo.png" alt="clima" class="mx-3">
                            Turismo
                        </a>
                        <a href="/faq" >
                            <img src="/images/faq.png" alt="clima" class="mx-3">
                            FAQ
                        </a>
                    @endif
                </div>
            </div>
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            
            <!-- Page Content -->
            <main class="min-h-screen pb-10">
                <div class="menu py-3">
                    <span style="font-size:30px;cursor:pointer" onclick="openNav()" >
                        <img src="/images/menu.svg" alt="" class="block md:mx-2 mx-auto">
                    </span>
                </div>                
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <script>
            function openNav() {
                if(window.innerWidth > 1280){
                    document.getElementById("myNav").style.width = "20%";
                    console.log("Escritorio xl");
                }
                if(window.innerWidth > 992 && window.innerWidth <= 1280){
                    document.getElementById("myNav").style.width = "30%";
                    console.log("Escritorio");
                }
                if(window.innerWidth <= 992 &&  window.innerWidth > 768 ){
                    document.getElementById("myNav").style.width = "40%";
                    console.log("Tablet");
                }
                if(window.innerWidth <= 768 ){
                    document.getElementById("myNav").style.width = "100%";
                    console.log("Móvil");
                }
                
              
            }
            
            function closeNav() {
              document.getElementById("myNav").style.width = "0%";
            }
        </script>
    </body>
</html>
