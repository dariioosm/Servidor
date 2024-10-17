<?php 
require('Coche.php');
include('Cuatro_ruedas.php');
echo $mi_coche = new Coche(1400,'negro');
echo '<br>';
echo $mi_coche ->annadir_persona(130);
echo '<br>';
echo $mi_coche ->repintar('rojo');
echo '<br>';
echo $mi_coche -> annadir_cadenas_nieve(2);

?>