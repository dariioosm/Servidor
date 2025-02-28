<?php
require '../conexion.php';

$id_usuario = $_SESSION['usuario_id'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Hiperglucemia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center text-danger">Eliminar Registro de Hiperglucemia</h2>
        
        <form action="../../php/hiper/delete.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Fecha de Control</label>
                <input type="date" name="fecha_control" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tipo de Comida</label>
                <select name="tipo_comida" class="form-control" required>
                    <option value="Desayuno">Desayuno</option>
                    <option value="Aperitivo">Aperitivo</option>
                    <option value="Comida">Comida</option>
                    <option value="Merienda">Merienda</option>
                    <option value="Cena">Cena</option>
                </select>
            </div>

            <button type="submit" class="btn btn-danger">Eliminar</button>        </form>
    </div>
</body>
</html>
