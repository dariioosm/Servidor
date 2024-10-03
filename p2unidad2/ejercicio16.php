<?php 
/*
*Crea un array llamado “lenguajes_cliente” y otro “lenguajes_servidor”, crea tu
*mismo los valores, poniendo índices alfanuméricos a cada valor con tres
*elementos cada uno. Junta ambos arrays en uno solo llamado “lenguajes” y muéstralo por pantalla en una tabla
 */

 $cliente=array(
    "C1"=>"JavaScript",
    "C2"=>"TypeScript",
    "C3"=>"HTML"
 );
 $servidor=array(
    "S1"=>"Perl",
    "S2"=>"Java",
    "S3"=>"C"

 );
 $lenguajes = array_merge($cliente,$servidor);

 echo"<table>";
 echo "<tr>"
 foreach($lenguajes as $index => $content){
    echo" <td> $content  </tr>";
 }
 echo "</td>";
 echo"</table>";
?>