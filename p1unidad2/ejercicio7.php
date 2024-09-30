<?php 
/* 
*Hacer un programa que calcule todos los números primos entre 1 y 50 y los
*muestre por pantalla. Un número primo es un número entero que sólo es
*divisible por 1 y por sí mismo.
*/
for($i=1;$i<=50;$i++){
    
if($i<=3){
    echo $i."<br>";
}else if($i>3  && $i%2!=0 || $i%3!=0){
    
    echo $i."<br>";
}
}

?>