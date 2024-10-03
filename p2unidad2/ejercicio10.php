<?php 
/*
*Carga el siguiente vector e imprime los valores del array asociativo usando la
*estructura de control foreach:
*$v[1]=90;
*$v[30]=7;
*$v[‘e’]=99;
*$v[‘hola’]=43;
*/
$v[1]=90;
$v[30]=7;
$v['e']=>99;
$v ['hola']=>43;  
    
foreach ($v as $key => $value) {
    echo $value;
    //?con esto sólo se muestran 99 y 43 no sé cómo sacar 90 y 7 :(
}


?>