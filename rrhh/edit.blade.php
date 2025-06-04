@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-12 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-semibold text-gray-900 mb-8">Editar Empleado</h1>

    <form method="POST" action="{{ route('rrhh.update', $alta->id) }}" class="space-y-6 bg-white p-8 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div>
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input
                type="text"
                name="nombre"
                id="nombre"
                value="{{ old('nombre', $alta->nombre) }}"
                required
                class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            >
            @error('nombre')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos</label>
            <input
                type="text"
                name="apellidos"
                id="apellidos"
                value="{{ old('apellidos', $alta->apellidos) }}"
                required
                class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            >
            @error('apellidos')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input
                type="email"
                name="email"
                id="email"
                value="{{ old('email', $alta->email) }}"
                required
                class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            >
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="departamento" class="block text-sm font-medium text-gray-700">Departamento</label>
            <select
                name="departamento"
                id="departamento"
                required
                class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            >
                @php
                    $departamentos = ['RRHH', 'Sistemas', 'Ciberseguridad', 'Ventas', 'Marketing', 'Web', 'Atención al Cliente'];
                @endphp
                @foreach($departamentos as $dep)
                    <option value="{{ $dep }}" {{ old('departamento', $alta->departamento) === $dep ? 'selected' : '' }}>
                        {{ $dep }}
                    </option>
                @endforeach
            </select>
            @error('departamento')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="fecha_entrada" class="block text-sm font-medium text-gray-700">Fecha de Entrada</label>
            <input
                type="date"
                name="fecha_entrada"
                id="fecha_entrada"
                value="{{ old('fecha_entrada', $alta->fecha_entrada->format('Y-m-d')) }}"
                required
                class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            >
            @error('fecha_entrada')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
            <input
                type="text"
                name="estado"
                id="estado"
                value="{{ old('estado', $alta->estado) }}"
                required
                class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            >
            @error('estado')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="jefe_id" class="block text-sm font-medium text-gray-700">Jefe (ID)</label>
            <input
                type="number"
                name="jefe_id"
                id="jefe_id"
                value="{{ old('jefe_id', $alta->jefe_id) }}"
                required
                class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            >
            @error('jefe_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="numero_serie" class="block text-sm font-medium text-gray-700">Número de Serie del Equipo</label>
            <select
                name="numero_serie"
                id="numero_serie"
                required
                class="mt-1 block w-full rounded-md border border-gray-300 bg-white px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            >
                <option value="">Selecciona un número de serie</option>
                @foreach($numerosSerie as $numero)
                    <option value="{{ $numero }}" {{ old('numero_serie', $alta->numero_serie) == $numero ? 'selected' : '' }}>
                        {{ $numero }}
                    </option>
                @endforeach
            </select>
            @error('numero_serie')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="pt-6">
            <button
                type="submit"
                class="w-full py-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >
                Actualizar
            </button>
        </div>
    </form>
</div>
@endsection
