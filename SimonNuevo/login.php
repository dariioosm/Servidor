<?php 
session_start();

$_SESSION['user']=$_POST['user'];
$_SESSION['pass']=$_POST['pass'];

//? conex a bbdd con root user

$connection = new mysqli('localhost','root','','bdsimon');
if($connection->connect_error) die('Fatal Error');
$query ="SELECT Nombre and Clave from usuarios";
$resultado=$connection->query($query);
if(!$resultado) die ('Fatal Error');
while ($row = $resultado->fetch_assoc()) {
    echo 'Nombre: ' . $row['Nombre'] . ' - Clave: ' . $row['Clave'] . '<br>';
}

?>