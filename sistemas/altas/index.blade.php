@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Altas Asignadas</h2>

    @if ($altas->isEmpty())
        <div class="text-center py-4 text-gray-600">No hay altas para mostrar.</div>
    @else
        <div class="overflow-x-auto shadow rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 bg-white">
                <thead class="bg-gray-100 text-gray-700 text-sm uppercase text-center">
                    <tr>
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Nombre Completo</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3">Equipo</th>
                        <th class="px-4 py-3">Número de Serie</th>
                        <th class="px-4 py-3">Jefe</th>
                        <th class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 text-center text-sm">
                    @foreach ($altas as $alta)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $alta->id }}</td>
                        <td class="px-4 py-2">{{ $alta->nombre }} {{ $alta->apellidos }}</td>
                        <td class="px-4 py-2">{{ $alta->email }}</td>
                        <td class="px-4 py-2">
                            <span class="inline-block px-2 py-1 text-xs rounded-full {{ $alta->estado === 'Activo' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                {{ $alta->estado }}
                            </span>
                        </td>
                        <td class="px-4 py-2">
                            {{ $alta->equipo?->modelo ?? 'No asignado' }} -
                            {{ $alta->equipo?->nombre_equipo ?? '' }}
                        </td>
                        <td class="px-4 py-2">{{ $alta->equipo?->serial ?? 'No asignado' }}</td>
                        <td class="px-4 py-2">
                            {{ $alta->jefe?->nombre ?? 'No asignado' }} -
                            {{ $alta->jefe?->email ?? '' }}
                        </td>
                        <td class="px-4 py-2 space-x-1">
                            <a href="{{ route('sistemas.altas.show', $alta->id) }}" class="inline-block px-3 py-1 bg-blue-100 text-blue-700 text-xs rounded hover:bg-blue-200 transition">Ver</a>
                            <a href="{{ route('sistemas.equipos.create', $alta->id) }}" class="inline-block px-3 py-1 bg-indigo-100 text-indigo-700 text-xs rounded hover:bg-indigo-200 transition">Asignar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection




