<?php
require 'conexion.php';
session_start();

$peli_nueva = $conn -> prepare('SELECT titulo FROM pelicula where anio = (SELECT  MAX(anio) FROM pelicula)');
$peli_nueva -> execute();

$resultado_nueva = $peli_nueva -> get_result();
$fila_nueva = $resultado_nueva -> fetch_assoc();

$peli_antigua = $conn -> prepare('SELECT titulo FROM pelicula WHERE anio = (SELECT MIN( anio )FROM pelicula)');
$peli_antigua ->execute();

$resultado_antigua = $peli_antigua -> get_result();
$fila_antigua = $resultado_antigua -> fetch_assoc();

//? la barra que aparece en azul en el pdf es referente a la antigüedad de la peli cuanto más reciente es la peli mayor es la barra (coger la fecha más antigua de la bbdd)

//? FORMULA DE LA LONGITUD DE LA BARRA
//? ((select del año de la pelicula - el año de la pelicula mas vieja)/50)*100 '%'

//TODO poner imagen de estrella en el echo del contador y mirar si hay un unset o un =0 para la sesion del contador de la puntuacion de la pelicula

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>La pelicula mas nueva es -> <?php echo htmlspecialchars($fila_nueva['titulo']) ?></p>
    <p>La pelicula mas antigua es -> <?php echo htmlspecialchars($fila_antigua['titulo']) ?></p>

</body>
</html>