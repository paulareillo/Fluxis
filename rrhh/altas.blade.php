@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <h2 class="text-3xl font-semibold text-gray-900">Listado de Altas</h2>

        <form method="GET" action="{{ route('rrhh.altas') }}" class="flex gap-2 w-full sm:w-auto">
            <input
                type="text"
                name="buscar"
                value="{{ old('buscar', $buscar ?? '') }}"
                placeholder="Buscar por nombre o apellidos"
                class="flex-grow px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                aria-label="Buscar"
            >
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">Buscar</button>
            @if(!empty($buscar))
                <a href="{{ route('rrhh.altas') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition">Limpiar</a>
            @endif
        </form>

        <a href="{{ route('rrhh.index') }}" class="px-4 py-2 border border-gray-400 text-gray-700 rounded-md hover:bg-gray-100 transition whitespace-nowrap">Volver al inicio</a>
    </div>

    @if($altas->isEmpty())
        <div class="p-4 bg-blue-50 border border-blue-200 text-blue-700 rounded-md shadow-sm">No hay altas registradas.</div>
    @else
        <div class="overflow-x-auto rounded-lg shadow ring-1 ring-black ring-opacity-5">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-800">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">ID</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nombre Completo</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Email</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Departamento</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Fecha de Entrada</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Número de Serie</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Estado</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Jefe</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($altas as $alta)
                    <tr>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">{{ $alta->id }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">{{ $alta->nombre }} {{ $alta->apellidos }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">{{ $alta->email }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">{{ $alta->departamento ?? 'No asignado' }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">{{ \Carbon\Carbon::parse($alta->fecha_entrada)->format('d/m/Y') }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">{{ $alta->equipo?->serial ?? 'Sin equipo' }}</td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-center">
                            @php
                                $badgeClass = "inline-flex items-center px-2 py-0.5 rounded text-xs font-medium";
                                $estado = strtolower($alta->estado);
                                if ($estado === 'pendiente') {
                                    $badgeClass .= " bg-yellow-100 text-yellow-800";
                                } elseif ($estado === 'en proceso') {
                                    $badgeClass .= " bg-blue-100 text-blue-800";
                                } elseif ($estado === 'terminado') {
                                    $badgeClass .= " bg-green-100 text-green-800";
                                } elseif ($estado === 'cancelado') {
                                    $badgeClass .= " bg-red-100 text-red-800";
                                } else {
                                    $badgeClass .= " bg-gray-100 text-gray-800";
                                }
                            @endphp
                            <span class="{{ $badgeClass }}">
                                {{ ucfirst($alta->estado) }}
                            </span>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-900">
                            {{ $alta->jefe?->nombre ?? '' }} {{ $alta->jefe?->apellidos ?? 'Sin jefe asignado' }}
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap text-center text-sm font-medium space-x-1">
                            <a href="{{ route('rrhh.pdf.show', $alta->id) }}" class="inline-block px-2 py-1 text-indigo-600 hover:text-indigo-900">Ver</a>
                            <a href="{{ route('rrhh.edit', $alta->id) }}" class="inline-block px-2 py-1 text-blue-600 hover:text-blue-900">Editar</a>
                            <form action="{{ route('rrhh.altas.destroy', $alta->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Seguro que quieres eliminar este empleado?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 px-2 py-1">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection





