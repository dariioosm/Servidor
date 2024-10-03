<?php 
/*
*Implementa un array asociativo con los siguientes valores y ordénalo de menor a mayor. Muestra los valores en una tabla.
* $numeros=array(3,2,8,123,5,1)
*/

$numeros=array(3,2,8,123,5,1);
sort($numeros);

foreach($numeros as $index => $content){
    echo "<tr>";
    echo "<td>$content</td>";
    echo"</tr>";
}

//print_r($numeros);
?>