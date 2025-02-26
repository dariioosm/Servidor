<?php 

require 'conexion.php';

if(!isset($_SESSION['user_id'])){
    header('Location:login.php');
    exit;
}
?>
<h1>Panel de control</h1>
<a href="logout.php">Cerrar Sesion</a>
