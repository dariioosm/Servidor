<?php
/*
*Crea una matriz para guardar a los amigos clasificados por diferentes ciudades.
*Los valores serán los siguientes:
*En Madrid: nombre Pedro, edad 32, telefono 91-999.99.99
*En Barcelona: nombre Susana, edad 34, telefono 93-000.00.00
*En Toledo: nombre Sonia, edad 42, telefono 925-09.09.09
*Haz un recorrido del array multidimensional mostrando los valores de tal maneraque nos muestre en cada ciudad que amigos tiene
*/

//TODO Creacion de la agenda
$agenda= array(
    'Madrid'=>array('nombre'=>"Pedro",
                    "edad"=>32,
                    "telefono"=>"91-999.99.99"),
    'Barcelona'=>array('nombre'=>"Susana",
                    "edad"=>34,
                    "telefono"=>"93-000.00.00"),
    'Toledo'=>array('nombre'=>"Sonia",
                    "edad"=>42,
                    "telefono"=>"925-09.09.09"),
);
//TODO impresion de datos

echo"<h6>Agenda de Contactos</h6>";
foreach($agenda as $ciudad => $content){
    echo "En $ciudad: ";
    foreach($content as $amigo => $datos)
    echo " $amigo $datos , ";
    echo "<br>";
}



?>