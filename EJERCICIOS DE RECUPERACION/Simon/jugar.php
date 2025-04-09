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

//TODO hacer el contador
if(!isset($_SESSION['contador'])){
    
    $_SESSION['contador']=0;
    $_SESSION['respuesta']=['black','black','black','black'];

}if (isset($_POST['color']) && $_SESSION['contador'] < 4) {
    $_SESSION['respuesta'][$_SESSION['contador']] = $_POST['color']; //? asigna el color del boton a un indice del array en el que se guarda la respuesta
    $_SESSION['contador']++;
}
rellenaCirculo($_SESSION['respuesta']);

if ($_SESSION['contador'] >= 4) {
    //TODO hacer los location a las paginas de acierto/fallo
    echo "<h3>Combinación correcta:</h3>";
    rellenaCirculo($_SESSION['combinacion']);

    if ($_SESSION['respuesta'] === $_SESSION['combinacion']) {
        header('Location:acierto.php');
    } else {
        header('Location: fallo.php');
    }
}
//TODO cuando funcione el programa, recordar hacer seleccion del nivel de dificultad y pasarlo
?>

<form action="" method="post">
        <button type='submit' name='color' value='red'>Rojo</button>
        <button type='submit' name='color' value='green'>Verde</button>
        <button type='submit' name='color' value='yellow'>Amarillo</button>
        <button type='submit' name='color' value='blue'>Azul</button>
</form>
</body>
</html>