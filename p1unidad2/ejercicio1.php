<?php
/*
 * haz un programa que dados dos numeros cargados en memoria: multiplique si son iguales, reste si el 1º es mayor que el 2º y, que sume si el 1º es menor que el 2º
 */
$numero1=3;
$numero2=4;
$resultado=0;
if($numero1==$numero2){
$resultado=$numero1*$numero2;
echo $resultado;
}else if($numero1>$numero2){
$resultado=$numero1-$numero2;
echo $resultado;
}else{
 $resultado=$numero1+$numero2;
 echo $resultado;   
}
?>