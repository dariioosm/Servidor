<?php
require 'conexion.php';
session_start();

if(isset($_POST['usuario'])&&isset($_POST['pass'])){
    $_SESSION['usuario']=$_POST['usuario'];
    $pass = $_POST['pass'];

    $select_usuario= $conn->prepare('SELECT Nombre FROM usuarios WHERE nombre = ? AND Clave= ?');
    $select_usuario -> bind_param('ss',$_SESSION['usuario'],$pass);
    $select_usuario->execute();

    $resultado_usuario = $select_usuario ->get_result();

    if($resultado_usuario && $resultado_usuario->num_rows>0){
        header('Location: inicio.php');
    }
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
    <h1>agenda de contactos</h1>
    <form action="" method="post">
        <label for="">Usuario</label> <input type="text" name="usuario" id="usuario">
        <label for="">Contraseña</label> <input type="password" name="pass" id="pass">
        <button type="submit">Iniciar Sesion</button>
    </form>
</body>
</html>