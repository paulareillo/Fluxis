@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Detalle de Alta #{{ $alta->id }}</h2>

    <div class="bg-white shadow-md rounded-lg p-6 space-y-6">
        {{-- Datos personales --}}
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-3">Datos del colaborador</h3>
            <p><span class="font-medium text-gray-600">Nombre completo:</span> {{ $alta->nombre }} {{ $alta->apellidos }}</p>
            <p><span class="font-medium text-gray-600">Email:</span> {{ $alta->email }}</p>
            <p>
                <span class="font-medium text-gray-600">Estado:</span>
                <span class="inline-block px-2 py-1 text-xs rounded-full {{ $alta->estado === 'Activo' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                    {{ $alta->estado }}
                </span>
            </p>
        </div>

        {{-- Equipo asignado --}}
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-3">Equipo asignado</h3>
            @if ($alta->equipo)
                <p><span class="font-medium text-gray-600">Modelo:</span> {{ $alta->equipo->modelo }}</p>
                <p><span class="font-medium text-gray-600">Nombre:</span> {{ $alta->equipo->nombre_equipo }}</p>
                <p><span class="font-medium text-gray-600">Número de Serie:</span> {{ $alta->equipo->serial }}</p>
                <p><span class="font-medium text-gray-600">Fecha de entrega:</span> {{ $alta->equipo->fecha_entrega }}</p>
            @else
                <p class="text-gray-500 italic">No hay equipo asignado.</p>
            @endif
        </div>

        {{-- Jefe asignado --}}
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-3">Jefe asignado</h3>
            @if ($alta->jefe)
                <p><span class="font-medium text-gray-600">Nombre:</span> {{ $alta->jefe->nombre }}</p>
                <p><span class="font-medium text-gray-600">Email:</span> {{ $alta->jefe->email }}</p>
            @else
                <p class="text-gray-500 italic">No hay jefe asignado.</p>
            @endif
        </div>

        {{-- Botones --}}
        <div class="flex flex-wrap gap-4 mt-6">
            <a href="{{ route('rrhh.index') }}" class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded transition">
                Volver
            </a>
            <a href="{{ route('rrhh.pdf.descargarPdfRRHH', $alta->id) }}" class="inline-block bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded transition" target="_blank">
                Descargar PDF
            </a>
        </div>
    </div>
</div>
@endsection
