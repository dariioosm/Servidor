<form action="{{ route('agenda.store') }}" method="POST">
    @csrf
    <label for="fecha">Fecha:</label>
    <input type="date" name="fecha" required>

    <label for="hora">Hora:</label>
    <input type="time" name="hora" required>

    <label for="persona">Persona:</label>
    <select name="persona" required>
        @foreach ($personas as $persona)
            <option value="{{ $persona->id }}">{{ $persona->nombre }}</option>
        @endforeach
    </select>

    <label>Imagen:</label>
    @foreach ($imagenes as $imagen)
        <input type="radio" name="imagen" value="{{ $imagen->id }}">
        <img src="{{ asset($imagen->imagen) }}" width="50">
    @endforeach

    <button type="submit">Guardar</button>
</form>
