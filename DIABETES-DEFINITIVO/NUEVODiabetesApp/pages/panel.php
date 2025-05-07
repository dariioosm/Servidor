<?php
require '../php/conexion.php';
session_start();
if (isset($_POST['logout'])) {
    session_destroy(); 
    header("Location: ../"); 
    exit();
}
if(isset($_SESSION['error'])){
    $fallo=$_SESSION['error'];
    unset($_SESSION['error']);
}
if(isset($_SESSION['mensaje'])){
    $mensaje=$_SESSION['mensaje'];
    unset($_SESSION['mensaje']);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Controles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 900px;
            margin-top: 50px;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .btn {
            font-weight: 600;
            border-radius: 8px;
        }
        .section-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }
        .alert {
            border-radius: 8px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="text-center mb-4 text-primary">Gestión de Controles</h1>

        <!-- Mensajes -->
        <?php if(isset($fallo)):?>
            <div class="alert alert-danger text-center" role="alert">
                <?=$fallo?>
            </div>
        <?php endif;?>
        <?php if(isset($mensaje)):?>
            <div class="alert alert-info text-center" role="alert">
                <?=$mensaje?>
            </div>
        <?php endif;?>

        <div class="row g-3">
            <div class="col-md-6">
                <div class="card p-3">
                    <h3 class="section-title">Control</h3>
                    <a href="./controlglucosa/insertaform.php" class="btn btn-primary w-100 mb-2">Insertar</a>
                    <a href="./controlglucosa/updateform.php" class="btn btn-success w-100 mb-2">Actualizar</a>
                    <a href="./controlglucosa/deleteform.php" class="btn btn-danger w-100">Eliminar</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card p-3">
                    <h3 class="section-title">Comida</h3>
                    <a href="./comidas/insertacomidas.php" class="btn btn-primary w-100 mb-2">Insertar</a>
                    <a href="./comidas/updatecomidas.php" class="btn btn-success w-100 mb-2">Actualizar</a>
                    <a href="./comidas/deletecomidas.php" class="btn btn-danger w-100">Eliminar</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card p-3">
                    <h3 class="section-title">Hipoglucemia</h3>
                    <a href="./incidencias/inserthipo.php" class="btn btn-primary w-100 mb-2">Insertar</a>
                    <a href="./incidencias/updatehipo.php" class="btn btn-success w-100 mb-2">Actualizar</a>
                    <a href="./incidencias/deletehipo.php" class="btn btn-danger w-100">Eliminar</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card p-3">
                    <h3 class="section-title">Hiperglucemia</h3>
                    <a href="./incidencias/inserthiper.php" class="btn btn-primary w-100 mb-2">Insertar</a>
                    <a href="./incidencias/updatehiper.php" class="btn btn-success w-100 mb-2">Actualizar</a>
                    <a href="./incidencias/deletehiper.php" class="btn btn-danger w-100">Eliminar</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card p-3">
                    <h3 class="section-title">Estadísticas</h3>
                    <a href="./stats.php" class="btn btn-info w-100">Ver Estadísticas</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card p-3">
                    <h3 class="section-title">Registros</h3>
                    <a href="./tabla.php" class="btn btn-secondary w-100">Ver Listado</a>
                </div>
            </div>

            <div class="col-md-6 mx-auto">
                <div class="card p-3">
                    <h3 class="section-title">Sesión</h3>
                    <form method="post">
                        <button type="submit" name="logout" class="btn btn-warning w-100">Cerrar Sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
