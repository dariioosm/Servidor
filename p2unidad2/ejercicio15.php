<?php 
/*
*Crea un array con los nombre Pedro, Ismael, Sonia, Clara, Susana, Alfonso y Teresa. 
*Muestra el número de elementos que contiene y cada elemento en unalista no numerada de html
 */

 $nombres=array('Pedro','Ismael','Sonia','Clara','Susana','Alfonso','Teresa');
 echo '<ul>';
 
 foreach($nombres as $index => $content){
   echo "<li> $content </li>";
 }
 echo '</ul>';
?>