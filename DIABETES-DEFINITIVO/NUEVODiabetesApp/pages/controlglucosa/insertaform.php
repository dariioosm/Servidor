<?php
//? Guarda fecha en la variable para marcar límite en el registro
$fecha_hoy = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Registro de Glucosa</title>
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .control-container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
        }
        .btn {
            font-weight: 600;
            border-radius: 8px;
        }
        h3 {
            text-align: center;
            color: #007bff;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="control-container">
        <h3>Introduce los datos del día</h3>
        <form action="../../php/controlglucosa/insert.php" method="post">
            
            <div class="mb-3">
                <label for="fecha_control" class="form-label">Fecha de control</label>
                <input type="date" name="fecha_control" id="fecha_control" max="<?=$fecha_hoy; ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="glucosa_lenta" class="form-label">Unidades de glucosa lenta</label>
                <input type="number" name="glucosa_lenta" id="glucosa_lenta" class="form-control" min="0" required>
            </div>

            <div class="mb-3">
                <label for="indice_actividad" class="form-label">Selecciona tu índice de actividad</label>
                <select class="form-select" id="indice_actividad" name="indice_actividad" required>
                    <option selected disabled>Elige tu nivel de actividad...</option>
                    <option value="1">Sedentario – Pasas la mayor parte del día sentado o acostado.</option>
                    <option value="2">Ligero – Caminas o te mueves ocasionalmente, pero sin esfuerzo significativo.</option>
                    <option value="3">Moderado – Realizas al menos 30 minutos de actividad como caminar rápido.</option>
                    <option value="4">Activo – Pasas varias horas en movimiento o haciendo ejercicio intenso.</option>
                    <option value="5">Muy activo – Tienes una actividad física intensa la mayor parte del día.</option>
                </select>
            </div>

            <div class="d-grid gap-2">
                <button name="insertForm" type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
