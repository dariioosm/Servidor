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
        require('pintacirculo.php');
        echo' <h1>Enhorabuena '. $_SESSION['usuario'].' has acertado</h1>';
        echo'Tu resupesta<br>';
        rellenaCirculo($_SESSION['respuesta']);
        echo'<br>La solucion<br>';
        rellenaCirculo($_SESSION['combinacion']);
    ?>
    <a href="memorizar.php">Volver a jugar</a>
    <a href="estadisticas.php">Ver estadisticas</a>
</body>
</html>