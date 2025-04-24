<?php
require 'conexion.php';
session_start();
$identificador= $conn->prepare('SELECT id FROM usuarios where usuario = ?');
$identificador->bind_param('s',$_SESSION['usuario']);
$identificador->execute();

$resultado = $identificador->get_result();

$usuario=intval($resultado);

$notas= $conn ->prepare('SELECT asignatura,nota FROM notas WHERE alumno = ?');
$notas->bind_param('i',$usuario);
$notas->execute();
$info = $notas->get_result();

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

</body>
</html>