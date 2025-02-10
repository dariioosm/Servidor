<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <h2>Welcome <?php session_start(); echo $_SESSION['usuario'] ?></h2>
    <div class="container-fluid">
<!--Formulario de control_glucosa-->
        <div class="row">
            <div class="col-4 mt-2 border border-primary-subtle rounded">
                <form action="#" method="post">
                <div class="mb-3">
                <label for="" class="form-label">Fecha de control</label>
                <input type="text" name="fecha_control" id="" class="form-control">
                </div>
                <div class="mb-3">
                <label for="" class="form-label">Unidades de glucosa lenta</label>
                <input type="number" name="glucosa_lenta" id="" class="form-control">
                </div>
                <div class="mb-3">
                <label for="" class="form-label">Indice de actividad</label>
                <br>
                <label><input type="radio" name="indice_actividad" value="1">Sedentario – Pasas la mayor parte del día sentado o acostado.</label><br>
                <label><input type="radio" name="indice_actividad"value="2">Ligero – Caminas o te mueves ocasionalmente, pero sin esfuerzo significativo.</label><br>
                <label><input type="radio" name="indice_actividad"value="3">Moderado – Realizas al menos 30 minutos de actividad como caminar rápido.</label><br>
                <label><input type="radio" name="indice_actividad"value="4">Activo – Pasas varias horas en movimiento o haciendo ejercicio intenso.</label><br>
                <label><input type="radio" name="indice_actividad"value="5">Muy activo – Tienes una actividad física intensa la mayor parte del día.</label><br>
                </div>
                <div class="mb-3">
                    <button type="submit">Enviar</button>
                </div>
                </form>
            </div>
        </div>

    </div>
</body>
</html>