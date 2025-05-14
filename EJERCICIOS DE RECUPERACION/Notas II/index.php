<?php
    require 'conexion.php';
    session_start();
    if(isset($_POST)){
        $_SESSION['usuario']=$_POST['usuario'];
        $usuario = $conn -> prepare('SELECT Nombre, Clave FROM usuario WHERE Nombre = ? AND Clave = ?');
        $usuario -> bind_param('ss' $_SESSION['usuario'],$_POST['pass']);
        
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
    <h1>Inicio de sesion</h1>
    <form action="" method= 'post'>
        <label for="">Usuario: <input type="text" name="usuaario" id=""> </label>
        <label for="">Contraseña <input type="password" name="pass" id=""></label>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>