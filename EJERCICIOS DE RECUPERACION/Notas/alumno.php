<?php
require 'conexion.php';
session_start();
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
    <a href="resultado_alumno.php">Ver tus notas</a>    
</body>
</html>