<?php
session_start();
require 'conexion.php';
$select_usuario= $conn->prepare('SELECT rol FROM usuarios WHERE usuario = ? AND password = ? ');
    $select_usuario -> bind_param('ss',$_SESSION['usuario'],$_SESSION['pass']);
    $select_usuario ->execute();
    $resultado_usuario= $select_usuario ->get_result();
    $fila= $resultado_usuario ->fetch_assoc();
    $rol=htmlspecialchars($fila['rol']);
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
    <a href="insertar_notas.php">Insertar Notas</a>
    <a href="mostrar_notas.php">Mostrar Notas</a>
</body>
</html>