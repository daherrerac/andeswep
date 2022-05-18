<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

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

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <div class="sidenav">
                <a href="/admin/eventos">
                    <img src="/images/iconos/icon_eventos.svg" alt="">
                    Eventos
                </a>                
                <a href="/admin/videos">
                    <img src="/images/iconos/icon_videos.svg" alt="">
                    Videos
                </a>
                {{-- <a href="#">
                    <img src="/images/iconos/icon_clima.svg" alt="">
                    Clima
                </a> --}}
                <a href="/admin/turismo">
                    <img src="/images/iconos/icon_turismo_1.svg" alt="">
                    Turismo
                </a>
                <a href="/admin/fitness">
                    <img src="/images/iconos/icon_fitness.svg" alt="">
                    Fitness
                </a>
                <a href="/galeria">
                    <img src="/images/iconos/icon_fotos.svg" alt="">
                    Fotos
                </a>
                <a href="/admin/faq">
                    <img src="/images/iconos/icon_fac.svg" alt="">
                    FAQ
                </a>
                <a href="/admin/ajustes">
                    <img src="/images/iconos/icon_info.svg" alt="">
                    Ajustes
                </a>
            </div>

            <div class="main">
                <!-- Page Content -->
                <main>
                    @yield('content')
                </main>
            </div>
            
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
