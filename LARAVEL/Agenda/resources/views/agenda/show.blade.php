<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agenda del Día</title>
</head>
<body>
    <h1>Agenda del Día</h1>

    {{-- Formulario de filtro --}}
    <form action="{{ route('agenda.show') }}" method="GET">
        <label for="persona">Persona:</label>
        <select name="persona" id="persona" required>
            <option value="">-- Selecciona una persona --</option>
            @foreach($personas as $persona)
                <option value="{{ $persona->idpersona }}" {{ request('persona') == $persona->idpersona ? 'selected' : '' }}>
                    {{ $persona->nombre }}
                </option>
            @endforeach
        </select>
        <br><br>

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" value="{{ request('fecha') }}" required>
        <br><br>

        <button type="submit">Mostrar Agenda</button>
    </form>

    {{-- Resultados --}}
    @if(isset($agenda) && $agenda->count())
        <h2>Resultados:</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Persona</th>
                    <th>Imagen</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agenda as $item)
                    <tr>
                        <td>{{ $item->nombre }} {{ $item->apellidos }}</td>
                        <td><img src="{{ asset($item->imagen) }}" alt="Imagen" width="50"></td>
                        <td>{{ $item->fecha }}</td>
                        <td>{{ $item->hora }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif(request()->has('persona'))
        <p>No hay entradas para la persona y fecha seleccionadas.</p>
    @endif
</body>
</html>
