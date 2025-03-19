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
    <div class="container mt-4">
        <h2 class="text-center mb-4">Listado de Pictogramas</h2>

        @if(isset($imagenes) && $imagenes->isEmpty())
            <p class="text-center text-muted">No hay imágenes en la BD</p>
        @else
            <div class="row">
                @foreach ($imagenes as $imagen)
                    <div class="col-md-3 mb-4 d-flex">
                        <div class="card w-100 text-center">
                            <div class="card-body d-flex flex-column align-items-center">
                                <!-- Imagen -->
                                <img src="{{ asset($imagen['imagen']) }}" alt="{{ $imagen['descripcion'] }}" 
                                    class="img-fluid border p-1 rounded"
                                    style="height: 100px; width: 100px; object-fit: cover;">
                                
                                <!-- Descripción -->
                                <p class="mt-2 fw-bold">{{ $imagen['descripcion'] }}</p>

                                <!-- URL (separada para evitar superposición) -->
                                <p class="text-muted small text-break">{{ asset($imagen['imagen']) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
