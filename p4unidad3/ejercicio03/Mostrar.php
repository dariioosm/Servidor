<?php 
require('Vehiculo.php');
$miVehiculo= new Vehiculo(1500,'negro');
echo $miVehiculo -> annadir_persona(70);
echo $miVehiculo -> circula();
echo $miVehiculo;
?>