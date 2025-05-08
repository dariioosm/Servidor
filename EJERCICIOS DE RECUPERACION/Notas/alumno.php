<?php
require 'conexion.php';
session_start();
if(isset($_POST['logout'])){
    session_destroy();
    header('Location: index.php');
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Bienvenido <?php echo'<h2>'.$_SESSION['usuario'].' con rol '. $rol .'</h2>'?></h2>
    <form action="" method="post" name="logout">
        <button type="submit">Cerrar Sesion</button>
    </form>
    <a href="resultado_alumno.php">Ver tus notas</a>    
</body>
</html>