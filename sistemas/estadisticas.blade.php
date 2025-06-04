@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4">
    <div class="text-center mb-10">
        <h2 class="text-3xl font-extrabold text-gray-800">Estadísticas de Equipos</h2>
        <p class="text-gray-500 mt-2">Consulta visual de los equipos registrados y su estado</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
        <div class="bg-white p-6 rounded-2xl shadow-md">
            <h3 class="text-lg font-semibold text-indigo-700 mb-4">Equipos por Modelo</h3>
            <canvas id="graficoModelos" height="250"></canvas>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-md">
            <h3 class="text-lg font-semibold text-indigo-700 mb-4">Equipos por Estado</h3>
            <canvas id="graficoEstados" height="250"></canvas>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-md mb-12">
        <form method="GET" action="{{ route('sistemas.estadisticas') }}" class="space-y-4">
            <label class="block text-sm font-medium text-gray-700">Buscar equipo</label>
            <input 
                type="text" 
                name="buscar" 
                value="{{ $buscar ?? '' }}" 
                class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none" 
                placeholder="Número de serie, nombre equipo, modelo"
            >
            <button 
                type="submit" 
                class="inline-flex items-center gap-2 px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M8 4h13M8 9h13M8 14h13M8 19h13M3 4h.01M3 9h.01M3 14h.01M3 19h.01" />
                </svg>
                Buscar
            </button>
        </form>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-md">
        <h3 class="text-lg font-semibold text-indigo-700 mb-4">
            Resultados ({{ $resultados->count() }})
        </h3>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 font-medium">Nombre</th>
                        <th class="px-4 py-2 font-medium">Modelo</th>
                        <th class="px-4 py-2 font-medium">Número de Serie</th>
                        <th class="px-4 py-2 font-medium">Estado</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-gray-800">
                    @foreach($resultados as $equipo)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $equipo->nombre_equipo }}</td>
                        <td class="px-4 py-2">{{ $equipo->modelo }}</td>
                        <td class="px-4 py-2">{{ $equipo->serial }}</td>
                        <td class="px-4 py-2 capitalize">{{ $equipo->estado }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctxModelos = document.getElementById('graficoModelos').getContext('2d');
new Chart(ctxModelos, {
    type: 'bar',
    data: {
        labels: {!! json_encode($porNombre->pluck('nombre_equipo')) !!},
        datasets: [{
            label: 'Cantidad',
            data: {!! json_encode($porNombre->pluck('total')) !!},
            backgroundColor: 'rgba(99, 102, 241, 0.7)', // Indigo
            borderRadius: 6
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: { stepSize: 1 }
            }
        }
    }
});

const ctxEstados = document.getElementById('graficoEstados').getContext('2d');
new Chart(ctxEstados, {
    type: 'doughnut',
    data: {
        labels: {!! json_encode($estados->pluck('estado')) !!},
        datasets: [{
            data: {!! json_encode($estados->pluck('total')) !!},
            backgroundColor: ['#34d399', '#fbbf24', '#f87171'], // Verde, Amarillo, Rojo
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom',
                labels: { color: '#374151' }
            }
        }
    }
});
</script>
@endsection
