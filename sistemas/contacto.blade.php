@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Lista de Contactos</h2>

    @if($users->isEmpty())
        <div class="bg-blue-100 text-blue-800 px-4 py-3 rounded shadow text-center">
            No hay usuarios registrados.
        </div>
    @else
        <div class="overflow-x-auto shadow rounded-lg">
            <table class="min-w-full bg-white rounded-xl overflow-hidden">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="text-left px-6 py-3 text-sm font-medium uppercase tracking-wider">Nombre</th>
                        <th class="text-left px-6 py-3 text-sm font-medium uppercase tracking-wider">Apellidos</th>
                        <th class="text-left px-6 py-3 text-sm font-medium uppercase tracking-wider">Email</th>
                        <th class="text-left px-6 py-3 text-sm font-medium uppercase tracking-wider">Extensión Teléfono</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($users as $user)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-gray-700">{{ $user->nombre }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $user->apellidos }}</td>
                        <td class="px-6 py-4 text-blue-600">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $user->extension_telefono ?? 'Sin extensión' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection

