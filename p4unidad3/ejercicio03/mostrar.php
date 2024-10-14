<?php 
include 'Vehiculo.php';
$vehiculo = new Vehiculo('negro', 1500);
$vehiculo ->circula(true);
$vehiculo->annadir_persona(70);

?>