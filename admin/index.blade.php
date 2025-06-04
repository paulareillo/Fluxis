@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-16 px-6 sm:px-8">
    <div class="bg-white shadow-lg rounded-2xl p-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-4 text-center">Panel de Administración</h1>
        <p class="text-lg text-gray-600 mb-8 text-center">
            Bienvenido, <span class="font-semibold text-indigo-600">{{ Auth::user()->nombre }}</span>.
        </p>

        <div class="flex justify-center">
            <a href="{{ route('admin.usuarios.index') }}"
               class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white font-semibold rounded-xl shadow hover:bg-indigo-700 transition duration-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 00-3-3.87M9 21v-2a4 4 0 013-3.87M12 12a4 4 0 100-8 4 4 0 000 8z" />
                </svg>
                Gestionar Usuarios
            </a>
        </div>
    </div>
</div>
@endsection
