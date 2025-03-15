<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado Pictogramas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Listado Pictogramas</h2>
        @if($imagenes->isEmpty())
        <p>No hay imagenes en la BD</p>
        @else
        <div class="row">
            @foreach ($imagenes as $imagen)
                <div class="col-md-3">
                    <img src="{{ asset('imagenes/' . $imagen['imagen']) }}" alt="{{ $imagen['descripcion'] }}" class="img-fluid">
                    <p>{{ $imagen['descripcion'] }}</p>
                    <div>
                        {{ asset('imagenes/' . $imagen['imagen']) }}
                    </div>
                </div>
            @endforeach
        </div>
        @endif
    </div>
</body>
</html>
