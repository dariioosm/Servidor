<?php 
/*
*Crea un array con los siguientes valores: 5->1, 12->2, 13->56, x->42. Muestra el
*contenido. Cuenta el número de elementos que tiene y muéstralo por pantalla. A
*continuación borrar el contenido de posición 5. Vuelve a mostrar el contenido y por último elimina el array
*/

$vector=array(
    5=>1, 
    12=>2, 
    13=>56, 
    'x'=>42
);
echo "vector completo <br>";
var_dump($vector);
echo count($vector) ."<br>";
unset($vector['5']);
echo "vector con el indice '5' eliminado <br>";
var_dump($vector);
?>