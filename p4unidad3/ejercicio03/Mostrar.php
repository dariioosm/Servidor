<?php 
require('Vehiculo.php');
$miVehiculo= new Vehiculo(1500,'negro');
echo '<br>';
echo $miVehiculo -> annadir_persona(70);
echo '<br>';
echo $miVehiculo -> circula();
echo '<br>';
echo $miVehiculo;
?>