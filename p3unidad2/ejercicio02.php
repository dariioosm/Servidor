<?php
/*
* Almacena la función anterior en el fichero matemáticas.php. Crea un fichero que la incluya y la utilice
*/

include 'ejercicio01.php';
$a=1;
$b=-3;
$c=2;
//? llamo directamente a la funcion, porque dentro de la misma tiene declaraciones echo.
//? si le pongo otras declaraciones de impresion como echo o print_r es redundante.
resultado($a,$b,$c);

?>