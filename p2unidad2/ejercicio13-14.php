<?php
//TODO ejercicio 13
/*
*Crea un array introduciendo las ciudades: Madrid, Barcelona, Londres, New York,
*Los Ángeles y Chicago, sin asignar índices al array. A continuación, muestra el
*contenido del array haciendo un recorrido diciendo el valor correspondiente a cada índice, ejemplo:

*La ciudad con el índice 1 tiene el nombre de Barcelona.
*/

$poblaciones= array('Madrid','Barcelona','Londres','New York','Los Angeles','Chicago');

foreach ($poblaciones as $index => $ciudad) {
    echo "La ciudad $ciudad esta en el indice $index <br>";
}

//TODO ejercicio 14

/*
*Repite el ejercicio anterior pero ahora si se han de crear índices asociativos, ejemplo:

*El índice del array que contiene como valor Madrid es MD
*/
$poblacion=array(

    'MD'=>'Madrid',
    'BCN'=>'Barcelona',
    'LNDN'=>'Londres',
    'NY'=>'New York',
    'LA'=>'Los Angeles',
    'CHCG'=>'Chicago'
);
foreach ($poblacion as $abre => $sitio) {
    echo"La ciudad de $sitio tiene como indice $abre <br>";
}
?>