<?php
require_once 'persona.php';
//Creamos el objeto.
$persona = new Persona();
//Seteamos las propiedades.
$persona->nombre = 'Dario';
$persona->apellido = 'Sanchez';
$persona->edad = 24;
//Mostramos el resultado de las propiedades.
echo 'Nombre: ' . $persona->nombre . '<br />';
echo 'Apellido: ' . $persona->apellido . '<br />';
echo 'Edad: ' . $persona->edad . '<br />';
?>