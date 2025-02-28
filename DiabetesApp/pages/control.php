<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

   <title>Document</title>
</head>
<body>
    <div class="container-fluid">
<!--?Formulario de control_glucosa-->
<!--//! en el formulario de inserccion tiene que coger por defecto la fecha del sistema-->
<!--//TODO control de glucosa con fecha de sistema que no se modifica--> 
        <div class="row">
            <div class="col-4 mt-2 border border-primary-subtle rounded">
                <form action="../php/controlglucosa/insercioncontrol.php" method="post">
                    <h3>Introduce los datos del dia</h3>
                <div class="mb-3">
                <label for="" class="form-label">Fecha de control</label>
                <input type="date" name="fecha_control" id="" class="form-control">
                </div>
                <div class="mb-3">
                <label for="" class="form-label">Unidades de glucosa lenta</label>
                <input type="number" name="glucosa_lenta" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="indice_actividad" class="form-label">Selecciona tu índice de actividad</label>
                    <select class="form-select" id="indice_actividad" name="indice_actividad" aria-label="Selecciona tu índice de actividad" required>
                      <option selected>Elige tu nivel de actividad...</option>
                      <option value="1">Sedentario – Pasas la mayor parte del día sentado o acostado.</option>
                      <option value="2">Ligero – Caminas o te mueves ocasionalmente, pero sin esfuerzo significativo.</option>
                      <option value="3">Moderado – Realizas al menos 30 minutos de actividad como caminar rápido.</option>
                      <option value="4">Activo – Pasas varias horas en movimiento o haciendo ejercicio intenso.</option>
                      <option value="5">Muy activo – Tienes una actividad física intensa la mayor parte del día.</option>
                    </select>
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