<?php
session_start();
//TODO guardar los post del formulario del registro en las sesiones

$_SESSION['alta']=$_POST['user'];
$_SESSION['passwd']=$_POST['passwd'];
$_SESSION['passwd2']=$_POST['passwd2'];
$_SESSION['rol']=$_POST['rol'];


//TODO comprobar que las contraseñas enviadas sean iguales
if($_SESSION['passwd']===$_SESSION['passwd2']){
    $user=$_SESSION['alta'];
    $passwd=$_SESSION['passwd2'];
    $rol=$_SESSION['rol']; 
    echo'La cuenta ha sido creada correctamente';
}else{
    echo 'Las contraseñas escritas no coinciden';
}




?>