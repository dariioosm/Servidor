<?php 
/*
*Escriba un programa a partir de un número entero generado de forma aleatoria
*indique si es primo. Un número primo es aquel que es divisible por el mismo y la unidad. 
*/
$aleatorio= rand();
$primo = false;
if($aleatorio<=3){
    $primo=true;
    echo $aleatorio." es un numero primo";
}else if($aleatorio>3  && $aleatorio%2==0 || $aleatorio%3==0){
    $primo =false;
    echo $aleatorio." no es numero primo";
}


?>