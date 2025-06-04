@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-6 sm:px-8 mt-12">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-900">Gestión de Usuarios</h2>
        <a href="{{ route('admin.usuarios.create') }}"
           class="inline-flex items-center px-5 py-2 bg-indigo-600 text-white font-semibold rounded-xl shadow hover:bg-indigo-700 transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 4v16m8-8H4" />
            </svg>
            Nuevo Usuario
        </a>
    </div>

    <div class="overflow-x-auto bg-white shadow rounded-xl ring-1 ring-gray-200">
        <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-700">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs text-left">
                <tr>
                    <th class="px-6 py-3">Nombre</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Rol</th>
                    <th class="px-6 py-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($usuarios as $usuario)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">{{ $usuario->nombre }} {{ $usuario->apellidos }}</td>
                    <td class="px-6 py-4">{{ $usuario->email }}</td>
                    <td class="px-6 py-4">
                        <span class="inline-block px-3 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">
                            {{ ucfirst($usuario->rol) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center space-x-2">
                        <a href="{{ route('admin.usuarios.edit', $usuario->id) }}"
                           class="inline-flex items-center px-3 py-1.5 bg-yellow-400 text-white text-xs font-semibold rounded-md hover:bg-yellow-500 transition">
                            Editar
                        </a>
                        <form action="{{ route('admin.usuarios.destroy', $usuario->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center px-3 py-1.5 bg-red-500 text-white text-xs font-semibold rounded-md hover:bg-red-600 transition">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
