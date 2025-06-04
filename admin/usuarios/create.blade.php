@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-12 px-6 sm:px-8">
    <h2 class="text-3xl font-bold text-gray-900 mb-6">Crear Nuevo Usuario</h2>

    <form action="{{ route('admin.usuarios.store') }}" method="POST" class="bg-white shadow rounded-xl p-6 space-y-5 ring-1 ring-gray-200">
        @csrf

        <div>
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" name="nombre" id="nombre" required
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" required
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
            <input type="email" name="email" id="email" required
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="rol" class="block text-sm font-medium text-gray-700">Rol</label>
            <select name="rol" id="rol" required
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="Admin">Admin</option>
                <option value="RRHH">RRHH</option>
                <option value="Sistemas">Sistemas</option>
                <option value="Jefe">Jefe</option>
            </select>
        </div>

        <div>
            <label for="extension_telefono" class="block text-sm font-medium text-gray-700">Extensión Telefónica</label>
            <input type="text" name="extension_telefono" id="extension_telefono"
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
            <input type="password" name="password" id="password" required
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="flex justify-end">
            <button type="submit"
                    class="inline-flex items-center px-5 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow hover:bg-indigo-700 transition">
                Guardar Usuario
            </button>
        </div>
    </form>
</div>
@endsection

