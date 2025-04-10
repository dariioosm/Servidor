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
    
        echo' <h1> Has fallado '.$_SESSION['usuario'].'</h1>';
        require('pintacirculo.php');
         echo'<h3>Tu respuesta</h3>';
        rellenaCirculo($_SESSION['respuesta']);

        echo'<h3>La solucion era</h3>';
        rellenaCirculo($_SESSION['combinacion']);
    ?>
    <a href="memorizar.php">Volver a jugar</a>
    <a href="estadisticas.php">Ver estadisticas</a>
</body>
</html>