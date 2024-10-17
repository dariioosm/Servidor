<?php 
require('Coche.php');
echo $mi_coche = new Coche(1400,'negro');
echo '<br>';
echo $mi_coche ->annadir_persona(130);
echo '<br>';
echo $mi_coche ->repintar('rojo');
echo '<br>';
echo $mi_coche -> annadir_cadenas_nieve(2);
echo '<br>';

require('Dos_ruedas.php');
$mi_moto=new Dos_ruedas(120,'negro');
$mi_moto -> poner_gasolina(20);
$mi_moto -> annadir_persona(80);
echo $mi_moto ->color;
echo '<br>';
echo $mi_moto -> peso;
echo '<br>';


require('Camion.php');
$mi_camion=new Camion(10000,'azul');
echo $mi_camion ->color;
echo '<br>';
echo $mi_camion ->annadir_remolque(15);
$mi_camion -> setPuertas(2);
echo '<br>';
echo 'El numero de puertas del camion es: '. $mi_camion -> getPuertas();





?>