<?php 
/*
*Realiza el ejercicio anterior pero con la funicón array_push().
 */

$animales=array("Lagatija","Araña","Perro","Gato","Raton");
$numeros=array("12","34","45","52","12");
$arboles=array("Sauce","Pino","Naranjo","Chopo","Perro","34");
$total=array();
array_push($total,$animales,$numeros,$arboles);
print_r($total);
?>