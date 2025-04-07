<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>¡Vamos a jugar al simon!</h1>
    <form action="memorizar.php" method="POST" >
    <label for="">Usuario</label>
    <input type="text" id="usuario" name="usuario" required>
    <label for="">Password</label>
    <input type="password" id="pass" name="pass" require>
    <button type="submit">Enviar</button>
    </form>
</body>
</html>
<?php
require('conexion.php');
session_start();

if(isset($_POST['usuario']) && isset($_POST['pass'])){
    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['pass'] = $_POST['pass'];
}
if(isset($_SESSION['usuario'])&& isset($_SESSION['pass'])){
    $usuario=$_POST['usuario'];
    $pass = $_POST['pass'];

    $seleccion = $conn->prepare('SELECT Nombre,Clave FROM usuarios WHERE Nombre LIKE ? AND Clave LIKE ?');
    $seleccion->bind_param('ss',$usuario,$pass);
    $seleccion->execute();
    $resultado = $seleccion ->get_result();

    if($resultado && $resultado -> num_rows>0){
        $fila = $resultado -> fetch_assoc();
        echo "Bienvenido, " . htmlspecialchars($fila['Nombre']) . "!<br>"; 
    }else{
        echo "Usuario o contraseña incorrectos.<br>";
    }

    if(!$result)die ('fatal error');
}
?>

