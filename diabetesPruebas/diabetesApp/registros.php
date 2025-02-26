<?php
require 'conexion.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $fecha_nacimiento=$_POST['fecha_nacimiento'];
    $login=$_POST['login'];
    $pass=password_hash($_POST['passwd'], password_default());
    $sql="INSERT INTO USUARIOS (nombre,apellidos,fecha_nacimiento,login,pass) values(?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    if($stmt->execute([$nombre,$apellidos,$fecha_nacimiento,$login,$pass])){
        echo 'usuario registrado correctamente';
    }else{
        echo 'error al registrar usuario';
    }
}
?>

<form action="#" method="post">

<input type="text" placeholder="nombre" required>
<input type="text" placeholder="apellidos" required>
<input type="date" placeholder="fecha_nacimiento" required>
<input type="text" placeholder="login" required>
<input type="password" placeholder="passwd" required>
 <button type="submit">Enviar</button>

</form>