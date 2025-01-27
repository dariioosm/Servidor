<?php
//conexion a mysql
$servidor = "localhost:8080";
$usuario = "root";
$contraseña = "";
$bdsql = 'perros';

//conexion a mongodb

require '../vendor/autoload.php';
$clienteMongo = new MongoDB\Client('mongodb://localhost:27017');
$bdMongo= $clienteMongo->$perros;
$coleccion_perros=$bdMongo->peligrosos;

$sql




?>