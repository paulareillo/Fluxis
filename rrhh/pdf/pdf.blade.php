<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle Alta #{{ $alta->id }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 13px;
            color: #333;
            margin: 40px;
        }

        h2 {
            text-align: center;
            color: #1a202c;
            font-size: 22px;
            margin-bottom: 30px;
        }

        h3 {
            color: #2d3748;
            font-size: 16px;
            margin-bottom: 10px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }

        .section {
            margin-bottom: 25px;
        }

        .label {
            font-weight: 600;
            color: #4a5568;
            display: inline-block;
            width: 160px;
        }

        .value {
            color: #2d3748;
        }

        .no-data {
            color: #718096;
            font-style: italic;
        }
    </style>
</head>
<body>
    <h2>Detalle de Alta #{{ $alta->id }}</h2>

    <div class="section">
        <h3>Información Personal</h3>
        <p><span class="label">Nombre completo:</span> <span class="value">{{ $alta->nombre }} {{ $alta->apellidos }}</span></p>
        <p><span class="label">Email:</span> <span class="value">{{ $alta->email }}</span></p>
        <p><span class="label">Estado:</span> <span class="value">{{ $alta->estado }}</span></p>
    </div>

    <div class="section">
        <h3>Equipo Asignado</h3>
        @if ($alta->equipo)
            <p><span class="label">Modelo:</span> <span class="value">{{ $alta->equipo->modelo }}</span></p>
            <p><span class="label">Nombre:</span> <span class="value">{{ $alta->equipo->nombre_equipo }}</span></p>
            <p><span class="label">Número de Serie:</span> <span class="value">{{ $alta->equipo->serial }}</span></p>
            <p><span class="label">Fecha de entrega:</span> <span class="value">{{ $alta->equipo->fecha_entrega }}</span></p>
        @else
            <p class="no-data">No hay equipo asignado.</p>
        @endif
    </div>

    <div class="section">
        <h3>Jefe Asignado</h3>
        @if ($alta->jefe)
            <p><span class="label">Nombre:</span> <span class="value">{{ $alta->jefe->nombre }}</span></p>
            <p><span class="label">Email:</span> <span class="value">{{ $alta->jefe->email }}</span></p>
        @else
            <p class="no-data">No hay jefe asignado.</p>
        @endif
    </div>
</body>
</html>