<?php
require 'conexion.php';
session_start();
if (!isset($_SESSION['puntos'])) {
    $_SESSION['puntos'] = 0;
}

if (isset($_POST['puntos'])) {
    if ($_SESSION['puntos'] < 10) {
        $_SESSION['puntos']++;
    }
}

if (isset($_POST['info'])) {

    $titulo = $_POST['titulo'];
    $anio = intval($_POST['anio']);
    $director = $_POST['director'];
    $poster = $_POST['poster'];
    $alquilada = intval($_POST['alq']);
    $sinopsis = $_POST['sinop'];
    $puntuacion = intval($_SESSION['puntos']);

    $inserta = $conn->prepare('INSERT INTO pelicula (titulo, anio, director, poster, alquilada, sinopsis, puntuacion) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $inserta->bind_param('sissisi', $titulo, $anio, $director, $poster, $alquilada, $sinopsis, $puntuacion);
    $inserta->execute();
    $_SESSION['puntos']=0;
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
    <form action="" method="post">
        <label>Pelicula<input type="text" name='titulo' required></label> <br>
        <label>Año<input type="number" name='anio' required></label> <br>
        <label>Director<input type="text" name='director' required></label> <br>
        <label>Poster<input type="text" name = 'poster' required></label> <br>
        <label>Alquilada<input type="number" min=0 max=1 name = 'alq'></label> <br>
        <label>Sinopsis<input type="text" name= 'sinop' required></label><br>
        <h3>Puntuacion</h3>
        <button type="submit" name="puntos">Votar</button>
        <?php 
                for($i=0; $i<$_SESSION['puntos'];$i++){
                    echo '<img src="estrella.webp" width="50px" height="50px">';
                }
        ?>
        <button type="submit" name = "info">Enviar</button>
    </form>
    
</body>
</html>