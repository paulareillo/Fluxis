@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto mt-6 px-4">
    <div class="text-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Calendario de Altas</h2>
        <p class="text-gray-600">Altas cargadas: {{ $altas->count() }}</p>
    </div>

    <div id="calendar" class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden"></div>
</div>

<style>
    #calendar {
        width: 100%;
        height: auto;
    }

    .fc-toolbar-title::first-letter {
        text-transform: uppercase;
    }

    .fc .fc-button {
        margin: 0 4px !important;
        border-radius: 0.5rem !important;
        padding: 0.4rem 0.75rem !important;
        font-size: 0.875rem !important;
    }

    .fc .fc-button-primary {
        background-color: #4f46e5;
        border: none;
    }

    .fc .fc-button-primary:hover {
        background-color: #4338ca;
    }

    .fc-view-harness {
        min-height: unset !important;
        overflow: hidden !important;
    }
</style>

<link href='{{ asset("css/fullcalendar/main.min.css") }}' rel='stylesheet' />

<script src='{{ asset("js/fullcalendar/index.global.min.js") }}'></script>
<script src='{{ asset("js/fullcalendar/es.global.min.js") }}'></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var eventos = [
            @foreach($altas as $alta)
            {
                title: "{{ addslashes($alta->nombre . ' ' . $alta->apellidos) }}",
                start: "{{ $alta->fecha_entrada }}"
            },
            @endforeach
        ];

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            firstDay: 1,
            events: eventos,
            height: 'auto',
            expandRows: true,
            aspectRatio: 2.0,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            }
        });

        calendar.render();
    });
</script>
@endsection


