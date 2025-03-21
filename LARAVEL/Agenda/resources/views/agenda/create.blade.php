<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Insertar Entrada en Agenda</title>
    <style>
        .error { color: red; }
        .success { color: green; }
        .imagen-option {
            display: inline-block;
            margin-right: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Insertar Entrada en Agenda</h1>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    {{-- Errores generales --}}
    @if($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('agenda.store') }}" method="POST">
        @csrf

        {{-- FECHA --}}
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" value="{{ old('fecha') }}" required>
        @error('fecha')
            <div class="error">{{ $message }}</div>
        @enderror
        <br><br>

        {{-- HORA --}}
        <label for="hora">Hora:</label>
        <input type="time" name="hora" id="hora" value="{{ old('hora') }}" required>
        @error('hora')
            <div class="error">{{ $message }}</div>
        @enderror
        <br><br>

        {{-- PERSONA --}}
        <label for="persona">Persona:</label>
        <select name="persona" id="persona" required>
            <option value="" disabled {{ old('persona') ? '' : 'selected' }}>-- Selecciona una persona --</option>
            @foreach($personas as $persona)
                <option value="{{ $persona->idpersona }}" {{ old('persona') == $persona->idpersona ? 'selected' : '' }}>
                    {{ $persona->nombre }}
                </option>
            @endforeach
        </select>
        @error('persona')
            <div class="error">{{ $message }}</div>
        @enderror
        <br><br>

        {{-- IMAGEN --}}
        <label>Imagen:</label>
        <br>
        @foreach($imagenes as $imagen)
            <label class="imagen-option">
                <input type="radio" name="imagen" value="{{ $imagen->idimagen }}"
                    {{ old('imagen', $loop->first ? $imagen->idimagen : '') == $imagen->idimagen ? 'checked' : '' }} required>
                <br>
                <img src="{{ asset($imagen->imagen) }}" alt="Imagen" width="50">
            </label>
        @endforeach
        @error('imagen')
            <div class="error">{{ $message }}</div>
        @enderror
        <br><br>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>
