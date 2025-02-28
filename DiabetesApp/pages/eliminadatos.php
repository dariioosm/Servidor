<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Eliminar Datos</h2>
        <form action="php/borradatos.php" method="post">
            <div class="mb-3">
                <label for="fecha_control" class="form-label">Fecha de Control:</label>
                <input type="date" id="fecha_control" name="fecha_control" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tipo_comida" class="form-label">Tipo de Comida:</label>
                <input type="text" id="tipo_comida" name="tipo_comida" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-danger">Eliminar Datos</button>
        </form>
    </div>
</body>
</html>