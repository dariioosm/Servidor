<?php
//? Guarda fecha en la variable para marcar límite en el registro
$fecha_control = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Hiperglucemia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4 text-primary">Actualizar Hiperglucemia</h2>
        <form action="../../php/hiper/update.php" method="POST">
            <input type="hidden" name="fecha_control" value="<?=htmlspecialchars($fecha_control)?>">
            <input type="hidden" name="tipo_comida" value="<?=htmlspecialchars($tipo_comida)?>">
            <div class="mb-3">
                <label for="glucosa_hiper" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="glucosa_hiper" name="glucosa_hiper" required value="<?=htmlspecialchars($fecha_hiper)?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Tipo de Comida</label>
                <select name="tipo_comida" class="form-select" required>
                    <option value="" disabled selected>Selecciona...</option>
                    <option value="Desayuno">Desayuno</option>
                    <option value="Aperitivo">Aperitivo</option>
                    <option value="Comida">Comida</option>
                    <option value="Merienda">Merienda</option>
                    <option value="Cena">Cena</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="glucosa_hiper" class="form-label">Glucosa</label>
                <input type="number" class="form-control" id="glucosa_hiper" name="glucosa_hiper" min="100" max="400" placeholder="100-400 mg/dl" required value="<?=htmlspecialchars($glucosa_hiper)?>">
            </div>
            <div class="mb-3">
                <label for="hora_hiper" class="form-label">Hora</label>
                <input type="time" class="form-control" id="hora_hiper" name="hora_hiper" required value="<?=htmlspecialchars($hora_hiper)?>">
            </div>
            <div class="mb-3">
                <label for="unidades_correccion" class="form-label">Unidades de Corrección</label>
                <input type="number" class="form-control" id="unidades_correccion" name="unidades_correccion" required value="<?=htmlspecialchars($unidades_correccion)?>">
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="../panel.php" class="btn btn-light">Volver a Inicio</a>
        </form>
    </div>
</body>
</html>

