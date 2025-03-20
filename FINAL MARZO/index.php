<?php
require_once ('login.php');
if($_SERVER['REQUEST_METHOD']=="POST"){
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    if(autenticarUsuario($usuario,$pass)){
        $_SESSION['usuario'] = $usuario;
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
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <label>Usuario</label>
    <input type="text" id="usuario" name="usuario" required>
    <label for="">Cotraseña</label>
    <input type="password" name="pass" id="pass">
    <button type="submit">Enviar</button>
    </form>
</body>
</html>