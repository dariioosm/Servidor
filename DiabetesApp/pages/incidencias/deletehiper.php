<?php
//? Guarda fecha en la variable para marcar límite en el registro
$fecha_hoy = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Registro de Hiperglucemia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        .btn {
            font-weight: 600;
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #dc3545;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Eliminar Registro de Hiperglucemia</h2>
        
        <form action="../../php/hiper/delete.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Fecha de Control</label>
                <input type="date" name="fecha_control" id="fecha_control" max="<?= $fecha_hoy;?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tipo de Comida</label>
                <select name="tipo_comida" class="form-select" required>
                    <option value="" disabled selected>Elige el tipo de comida...</option>
                    <option value="Desayuno">Desayuno</option>
                    <option value="Aperitivo">Aperitivo</option>
                    <option value="Comida">Comida</option>
                    <option value="Merienda">Merienda</option>
                    <option value="Cena">Cena</option>
                </select>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-danger w-100">Eliminar Registro</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("fecha_control").valueAsDate = new Date();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
