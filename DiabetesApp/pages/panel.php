<?php
require '../php/conexion.php';
if (isset($_POST['logout'])) {
    session_destroy(); // Cierra la sesión
    header("Location: login.php"); // Redirige al login
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Controles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Gestión de Controles</h1>
        
        <div class="row">
            <div class="col-md-3">
                <h3>Control</h3>
                <a href="./controlglucosa/insertaform.php" class="btn btn-primary d-block mb-2">Insertar Control</a>
                <a href="./controlglucosa/updateform.php" class="btn btn-success d-block mb-2">Actualizar Control</a>
                <a href="./controlglucosa/deleteform.php" class="btn btn-danger d-block mb-2">Eliminar Control</a>
            </div>
            <div class="col-md-3">
                <h3>Comida</h3>
                <a href="./comidas/insertacomidas.php" class="btn btn-primary d-block mb-2">Insertar Comida</a>
                <a href="./comidas/" class="btn btn-success d-block mb-2">Actualizar Comida</a>
                <a href="./comidas/deletecomidas.php" class="btn btn-danger d-block mb-2">Eliminar Comida</a>
            </div>
            <div class="col-md-3">
                <h3>Hipoglucemia</h3>
                <a href="#" class="btn btn-primary d-block mb-2">Insertar Hipoglucemia</a>
                <a href="#" class="btn btn-success d-block mb-2">Actualizar Hipoglucemia</a>
                <a href="#" class="btn btn-danger d-block mb-2">Eliminar Hipoglucemia</a>
            </div>
            <div class="col-md-3">
                <h3>Hiperglucemia</h3>
                <a href="#" class="btn btn-primary d-block mb-2">Insertar Hiperglucemia</a>
                <a href="#" class="btn btn-success d-block mb-2">Actualizar Hiperglucemia</a>
                <a href="#" class="btn btn-danger d-block mb-2">Eliminar Hiperglucemia</a>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-md-3">
                <h3>Estadísticas</h3>
                <a href="#" class="btn btn-info d-block mb-2">Ver Estadísticas</a>
            </div>
            <div class="col-md-3">
                <h3>Listado de Registros</h3>
                <a href="../php/tabla.php" class="btn btn-secondary d-block mb-2">Ver Listado</a>
            </div>
        </div>

        <!-- Botón de Cerrar Sesión -->
        <div class="row mt-4">
            <div class="col-md-3">
                <h3>Sesión</h3>
                <form method="post">
                    <button type="submit" name="logout" class="btn btn-warning d-block">Cerrar Sesión</button>
                </form>
            </div>
        </div>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
