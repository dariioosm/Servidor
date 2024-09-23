<?php 
/*
 *Dados 3 números asignados dentro del código a mostrar el número mayor de los tres
 * 
 * 
*/
$numero1=2;
$numero2=3;
$numero3=4;
if($numero1>$numero2&&$numero1>$numero3){
    echo "el numero mayor es:" .$numero1;
}else
if($numero2>$numero1&&$numero2>$numero3){
    echo "el numero mayor es:". $numero2;
}else

if($numero3>$numero1&&$numero3>$numero2){
    echo "el numero mayor es:".$numero3;
}
?>