<?php 
/*
*Crea un array con los nombre Pedro, Ismael, Sonia, Clara, Susana, Alfonso y Teresa. 
*Muestra el número de elementos que contiene y cada elemento en unalista no numerada de html
 */

 $nombres=array('Pedro','Ismael','Sonia','Clara','Susana','Alfonso','Teresa');
 echo '<ul>';
 for ($i=0;$i<=count($nombres);$i++){
    echo "<li> $nombres[$i] </li>"; //? Warning: Undefined array key 7 in C:\xampp\htdocs\Servidor-1\p2unidad2\ejercicio15.php on line 10
 }
 echo '</ul>';
?>