<?php
//? Guarda fecha en la variable para marcar límite en el registro
$fecha_hoy = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Control de Glucosa</title>
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
            max-width: 450px;
        }
        .btn {
            font-weight: 600;
            border-radius: 8px;
        }
        h3 {
            text-align: center;
            color: #dc3545;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h3>¿Qué fecha de control quieres eliminar?</h3>
        
        <form action="../../php/controlglucosa/delete.php" method="post">
            <div class="mb-3">
                <label class="form-label">Fecha de control</label>
                <input type="date" name="fecha_control" id="fecha_control"  max="<?=$fecha_hoy ?>" class="form-control" required>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-danger w-100">Eliminar Registro</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
