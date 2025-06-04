@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
    <h2 class="text-3xl font-semibold text-gray-900 text-center mb-8">Mis solicitudes de alta</h2>

    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <form method="GET" action="{{ route('altas.index') }}" class="flex gap-2 w-full sm:w-auto">
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
                <a href="{{ route('altas.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition">Limpiar</a>
            @endif
        </form>

        <a href="{{ route('altas.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition whitespace-nowrap">Nueva Alta</a>
        <a href="{{ route('jefe.index') }}" class="px-4 py-2 border border-gray-400 text-gray-700 rounded-md hover:bg-gray-100 transition whitespace-nowrap">Volver al inicio</a>
    </div>

    @if(!empty($resultados) && $resultados->count())
        <div class="mb-8 max-w-2xl mx-auto">
            <h5 class="text-lg font-semibold mb-3 text-gray-800">Resultados de la búsqueda:</h5>
            <ul class="space-y-2">
                @foreach($resultados as $resultado)
                    <li class="px-4 py-3 bg-white border border-gray-200 rounded-lg shadow-sm">
                        {{ $resultado->nombre }} {{ $resultado->apellidos }} - <span class="text-indigo-600">{{ $resultado->email }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="mb-6 px-6 py-4 bg-green-100 border border-green-400 text-green-700 rounded-md shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    @if($altas->isEmpty())
        <div class="p-4 bg-blue-50 border border-blue-200 text-blue-700 rounded-md shadow-sm">No hay altas registradas.</div>
    @else
        <div class="overflow-x-auto rounded-lg shadow ring-1 ring-black ring-opacity-5">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-800">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nombre</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Apellidos</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Email</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Departamento</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Fecha Entrada</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Estado</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($altas as $alta)
                        @php
                            $estado = strtolower($alta->estado);
                            $badgeClass = "inline-flex items-center px-2 py-0.5 rounded text-xs font-medium";
                            switch ($estado) {
                                case 'pendiente':
                                    $badgeClass .= " bg-yellow-100 text-yellow-800";
                                    break;
                                case 'en proceso':
                                    $badgeClass .= " bg-blue-100 text-blue-800";
                                    break;
                                case 'terminado':
                                    $badgeClass .= " bg-green-100 text-green-800";
                                    break;
                                case 'cancelado':
                                    $badgeClass .= " bg-red-100 text-red-800";
                                    break;
                                default:
                                    $badgeClass .= " bg-gray-100 text-gray-800";
                            }
                        @endphp
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-4 py-2 text-sm text-gray-900">{{ $alta->nombre }}</td>
                            <td class="px-4 py-2 text-sm text-gray-900">{{ $alta->apellidos }}</td>
                            <td class="px-4 py-2 text-sm text-indigo-600">{{ $alta->email }}</td>
                            <td class="px-4 py-2 text-sm text-gray-900">{{ $alta->departamento ?? 'Sin asignar' }}</td>
                            <td class="px-4 py-2 text-sm text-gray-900">{{ \Carbon\Carbon::parse($alta->fecha_entrada)->format('d/m/Y') }}</td>
                            <td class="px-4 py-2 text-sm text-center">
                                <span class="{{ $badgeClass }}">{{ ucfirst($alta->estado) }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
