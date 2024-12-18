<?php
require_once 'conexion.php';
session_start();
$_POST['respuesta']=$_SESSION('respuesta');

//TODO sacar fecha de sistema


//TODO consultar en la bbdd con count cuantos aciertos hay en el dia de hoy¿?
$conn= new mysqli($servername, $username, $password, $dbname);
$query = "SELECT "

?>