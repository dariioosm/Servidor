<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <h2>Iniciar sesion</h2>
        <label for="">Usuario
            <input type="text" name="usuario" id="usuario">
        </label>
        
        <label for="">Contraseña
            <input type="password" name="pass" id="pass">
        </label>
        <button type="submit">Enviar</button>
    </form>
    <?php echo $mensaje;?>
</body>
</html>


<?php
require 'conexion.php';
session_start();

if(isset($_POST['usuario']) && isset( $_POST['pass'])){
    $_SESSION['usuario']=$_POST['usuario'];
    $_SESSION['pass']=$_POST['pass'];


    $select_usuario= $conn->prepare('SELECT rol FROM usuarios WHERE usuario = ? AND password = ? ');
    $select_usuario -> bind_param('ss',$_SESSION['usuario'],$_SESSION['pass']);
    $select_usuario ->execute();

    $resultado_usuario= $select_usuario ->get_result();

        if($resultado_usuario && $resultado_usuario->num_rows>0){
            $fila = $resultado_usuario ->fetch_assoc();
            if($fila['rol'] == 'director'){
                header('Location: director.php');
            }elseif($fila['rol'] == 'alumno'){
                header('Location: alumno.php');
            }
        }else{
            $mensaje= 'Usuario o Contraseña incorrectos';
        }
}
?>


