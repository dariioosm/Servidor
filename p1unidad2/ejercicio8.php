<?php
/*
*Calcular si un número entero generado de forma aleatoria entre 1 y 1000 es
*perfecto. Un número perfecto es aquel que la suma de sus divisores es él mismo,
*por ejemplo el 6, sus divisores son 1,2,3 la suma de los mismos es 6
 */
$perfecto=rand(1,1000);
$suma=0;
for ($i=1;$i<$perfecto;$i++){
    if($perfecto%$i==0){
        $suma+=$i;
    }
}
if($suma==$perfecto){
    echo "$perfecto es un numero perfecto";
}else{
    echo "$perfecto no es un numero perfecto";
}
?>