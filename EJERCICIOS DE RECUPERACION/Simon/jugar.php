<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
session_start();
require 'pintacirculo.php';
var_dump($_SESSION);
//TODO hacer el contador
if(!isset($_SESSION['contador'])){
    
    $_SESSION['contador']=0;
    $_SESSION['respuesta']=['black','black','black','black'];
    rellenaCirculo($_SESSION['respuesta']);
    $_SESSION['correcto']=$_SESSION['combinacion'];
}else{
    //!como poner los colores por orden de pulsacion
    $_SESSION;
    $_SESSION['contador']++;
}
?>

<form action="" method="post">
        <button type='submit' name='color' value='red'>Rojo</button>
        <button type='submit' name='color' value='green'>Verde</button>
        <button type='submit' name='color' value='yellow'>Amarillo</button>
        <button type='submit' name='color' value='blue'>Azul</button>
</form>
</body>
</html>