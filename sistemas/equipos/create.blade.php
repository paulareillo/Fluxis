@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Preparar equipo para alta: <span class="text-indigo-600">{{ $alta->nombre }} {{ $alta->apellidos }}</span></h1>

    <form action="{{ route('sistemas.equipos.store', $alta) }}" method="POST" class="space-y-6 bg-white p-6 rounded-xl shadow-md">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700">Nombre del equipo</label>
            <input type="text" name="nombre_equipo" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Número de serie</label>
            <input type="text" name="serial" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Modelo</label>
            <input type="text" name="modelo" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">¿Equipo reutilizado?</label>
            <select name="reutilizado" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="0">No</option>
                <option value="1">Sí</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Fecha de entrega</label>
            <input type="date" name="fecha_entrega" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
        </div>

        <div class="pt-4">
            <button type="submit"
                class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Registrar equipo
            </button>
        </div>
    </form>
</div>
@endsection
