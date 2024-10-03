<?php 
/*
*Rellena los siguientes tres arrays y júntalos en uno nuevo. Muéstralos porpantalla. 
*Utiliza la función array_merge()
*/
$animales=array("Lagatija","Araña","Perro","Gato","Raton");
$numeros=array("12","34","45","52","12");
$arboles=array("Sauce","Pino","Naranjo","Chopo","Perro","34");
$total= array_merge($animales,$numeros,$arboles);
print_r($total);

?>