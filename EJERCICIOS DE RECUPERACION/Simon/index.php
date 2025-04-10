<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>¡Vamos a jugar al simon!</h1>
    <form action="#" method="POST" >
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

    $seleccion = $conn->prepare('SELECT Nombre,Clave,Rol FROM usuarios WHERE Nombre LIKE ? AND Clave LIKE ?');
    $seleccion->bind_param('ss',$_SESSION['usuario'],$_SESSION['pass']);
    $seleccion->execute();
    $resultado = $seleccion ->get_result();

    if($resultado && $resultado -> num_rows>0){
        $fila = $resultado -> fetch_assoc();
        if(htmlspecialchars($fila['Rol'])==0){
        echo "Bienvenido, " . htmlspecialchars($fila['Nombre']) . "!<br>"; 
        header('Location: memorizar.php');
        }else if(htmlspecialchars($fila['Rol'])==1){
            header('Location: dificultad.php');
        }
    }else{
        echo "Usuario o contraseña incorrectos.<br>";
    }

    if(!$result)die ('fatal error');
}
?>

