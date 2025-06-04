@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-12 px-6 sm:px-8">
    {{-- Botón para volver --}}
    <a href="{{ route('jefe.index') }}" 
       class="inline-block mb-8 px-4 py-2 text-indigo-700 border border-indigo-700 rounded-lg hover:bg-indigo-700 hover:text-white transition">
        Volver al inicio
    </a>

    {{-- Formulario de alta --}}
    <form action="{{ route('altas.store') }}" method="POST" class="bg-white p-8 rounded-2xl shadow-md">
        @csrf

        <div class="mb-6">
            <label for="nombre" class="block text-gray-700 font-semibold mb-2">Nombre</label>
            <input type="text" name="nombre" id="nombre" required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>

        <div class="mb-6">
            <label for="apellidos" class="block text-gray-700 font-semibold mb-2">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>

        <div class="mb-6">
            <label for="email" class="block text-gray-700 font-semibold mb-2">Correo electrónico</label>
            <input type="email" name="email" id="email" required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>

        <div class="mb-6">
            <label for="departamento" class="block text-gray-700 font-semibold mb-2">Departamento</label>
            <select name="departamento" id="departamento" required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <option value="" disabled selected>Selecciona un departamento</option>
                @php
                    $departamentos = ['RRHH', 'Sistemas', 'Ciberseguridad', 'Ventas', 'Marketing', 'Web', 'Atención al Cliente'];
                @endphp
                @foreach($departamentos as $dep)
                    <option value="{{ $dep }}" {{ old('departamento') === $dep ? 'selected' : '' }}>
                        {{ $dep }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-8">
            <label for="fecha_entrada" class="block text-gray-700 font-semibold mb-2">Fecha de entrada</label>
            <input type="date" name="fecha_entrada" id="fecha_entrada" required
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>

        <button type="submit"
            class="w-full bg-indigo-600 text-white font-semibold py-3 rounded-lg hover:bg-indigo-700 transition">
            Registrar Alta
        </button>
    </form>
</div>
@endsection


