@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-12 px-6 sm:px-8">
    <h2 class="text-4xl font-bold text-gray-900 mb-3 tracking-tight text-center">Panel de Control - Jefe</h2>
    <p class="text-lg text-gray-600 mb-10 text-center">
        Bienvenido, <span class="font-semibold text-indigo-600">{{ Auth::user()->nombre }}</span>.
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        {{-- Crear Alta --}}
        <a href="{{ route('altas.create') }}" 
           class="flex items-center px-6 py-5 bg-white border border-gray-200 rounded-2xl shadow hover:shadow-md hover:bg-indigo-50 transition">
            <svg class="w-6 h-6 text-indigo-600 mr-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 4v16m8-8H4" />
            </svg>
            <span class="text-lg font-medium text-gray-800">Crear Alta</span>
        </a>

        {{-- Ver Altas (con icono de ojo) --}}
        <a href="{{ route('altas.index') }}" 
           class="flex items-center px-6 py-5 bg-white border border-gray-200 rounded-2xl shadow hover:shadow-md hover:bg-indigo-50 transition">
            <svg class="w-6 h-6 text-indigo-600 mr-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                <circle cx="12" cy="12" r="3"/>
            </svg>
            <span class="text-lg font-medium text-gray-800">Ver Altas</span>
        </a>

        {{-- Calendario --}}
        <a href="{{ route('jefe.calendario') }}" 
           class="flex items-center px-6 py-5 bg-white border border-gray-200 rounded-2xl shadow hover:shadow-md hover:bg-indigo-50 transition">
            <svg class="w-6 h-6 text-indigo-600 mr-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="M8 7V3m8 4V3M3 11h18M5 5h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
            </svg>
            <span class="text-lg font-medium text-gray-800">Calendario</span>
        </a>

        {{-- Contacto --}}
        <a href="{{ route('jefe.contacto') }}" 
           class="flex items-center px-6 py-5 bg-white border border-gray-200 rounded-2xl shadow hover:shadow-md hover:bg-indigo-50 transition">
            <svg class="w-6 h-6 text-indigo-600 mr-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="M16 12a4 4 0 01-8 0 4 4 0 018 0zM4 6h16M4 6a2 2 0 012-2h12a2 2 0 012 2M4 6v12a2 2 0 002 2h12a2 2 0 002-2V6" />
            </svg>
            <span class="text-lg font-medium text-gray-800">Contacto</span>
        </a>
    </div>
</div>
@endsection
