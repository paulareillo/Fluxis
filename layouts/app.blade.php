<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Fluxis</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('agregar-usuario.ico') }}">



    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-r from-indigo-50 via-white to-indigo-50 min-h-screen flex flex-col">

    {{-- Navigation --}}
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
            @include('layouts.navigation')
        </div>
    </nav>

    {{-- Header --}}
    @isset($header)
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-5xl mx-auto py-10 px-6 sm:px-8 lg:px-12">
                <h1 class="text-4xl font-semibold text-gray-900 tracking-wide leading-tight">
                    {{ $header }}
                </h1>
            </div>
        </header>
    @endisset

    {{-- Main Content --}}
    <main class="flex-grow w-full px-4 sm:px-6 lg:px-12 py-12">
        <div class="bg-white rounded-xl shadow-lg p-6 w-full">
            @yield('content')
        </div>
    </main>

    {{-- Footer --}}
    <footer class="bg-white border-t border-gray-200 text-center py-8 mt-12 text-gray-500 text-sm select-none tracking-wide">
        &copy; {{ date('Y') }} {{ config('app.name', 'Fluxis') }}. Todos los derechos reservados.
    </footer>
</body>
</html>


