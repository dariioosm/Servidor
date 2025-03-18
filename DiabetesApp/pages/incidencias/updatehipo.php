<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Hipoglucemia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="form-container bg-white p-4 rounded shadow" style="max-width: 500px; width: 100%;">
        <h2 class="text-center text-success mb-4">Actualizar Hipoglucemia</h2>
        
        <form action="../../php/hipo/update.php" method="POST">
            <div class="mb-3">
                <label class="form-label">ID del Registro</label>
                <input type="number" name="id_hiperglucemia" class="form-control" required placeholder="Ingrese el ID del registro">
            </div>

            <div class="mb-3">
                <label class="form-label">Nueva Fecha de Control</label>
                <input type="date" name="fecha_control" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nuevo Tipo de Comida</label>
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
                <label class="form-label">Nueva Glucosa Hipo</label>
                <input type="number" name="glucosa_hipo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nueva Hora de la Hipo</label>
                <input type="time" name="hora_hipo" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Actualizar Registro</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
