@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-12 px-6 sm:px-8">
    <h2 class="text-4xl font-bold text-gray-900 mb-3 tracking-tight text-center">Panel de Control - Sistemas</h2>
    <p class="text-lg text-gray-600 mb-10 text-center">
        Bienvenido, <span class="font-semibold text-blue-600">{{ Auth::user()->nombre }}</span>.
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <a href="{{ route('sistemas.altas.index') }}" class="flex items-center px-6 py-5 bg-white border border-gray-200 rounded-2xl shadow hover:shadow-md hover:bg-blue-50 transition">
            <svg class="w-6 h-6 text-blue-600 mr-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M3 10h18M12 3v18M4 4h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2z"/>
            </svg>
            <span class="text-lg font-medium text-gray-800">Gestionar Equipos</span>
        </a>

        <a href="{{ route('sistemas.calendario') }}" class="flex items-center px-6 py-5 bg-white border border-gray-200 rounded-2xl shadow hover:shadow-md hover:bg-blue-50 transition">
            <svg class="w-6 h-6 text-blue-600 mr-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M8 7V3m8 4V3M3 11h18M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
            </svg>
            <span class="text-lg font-medium text-gray-800">Calendario</span>
        </a>

        <a href="{{ route('sistemas.estadisticas') }}" class="flex items-center px-6 py-5 bg-white border border-gray-200 rounded-2xl shadow hover:shadow-md hover:bg-blue-50 transition">
            <svg class="w-6 h-6 text-blue-600 mr-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M11 3v18m4-14v14m4-10v10m-12 4V9m-4 10v-6" />
            </svg>
            <span class="text-lg font-medium text-gray-800">Estadísticas</span>
        </a>

        <a href="{{ route('sistemas.contacto') }}" class="flex items-center px-6 py-5 bg-white border border-gray-200 rounded-2xl shadow hover:shadow-md hover:bg-blue-50 transition">
            <svg class="w-6 h-6 text-blue-600 mr-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M16 12a4 4 0 01-8 0 4 4 0 018 0zM4 6h16M4 6a2 2 0 012-2h12a2 2 0 012 2M4 6v12a2 2 0 002 2h12a2 2 0 002-2V6" />
            </svg>
            <span class="text-lg font-medium text-gray-800">Contacto</span>
        </a>
    </div>
</div>
@endsection
