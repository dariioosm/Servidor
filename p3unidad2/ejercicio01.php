<?php
/*
*Crea una función para resolver la ecuación de segundo grado. Esta función recibe los coeficientes de la ecuación y devuelve un array con las soluciones. 
*Si no hay soluciones reales, devuelve FALSE.
*/
    $a=0;
    $b=0;
    $c=0;
function resultado($a, $b,$c){
    $solucion1=0;
    $solucion2=0;
    $is_real=false;
    if(((2*$b)-(4*$a*$c))<0){
    echo"No hay soluciones"
    }else if(((2*$b)-(4*$a*$c))>=0){
        $solucion1=(-$b+sqrt(2*$b)-(4*$a*$c))/(2*$a);
        $solucion2=(-$b+sqrt(2*$b)+(4*$a*$c))/(2*$a);
        echo $solucion1;
        echo $solucion2;
    }else if(((2*$b)-(4*$a*$c))!==0){
        $solucion1=-$b/2*$a;
        echo $solucion1;
    }
    
    
}

?>