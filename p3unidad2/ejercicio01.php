<?php
/*
*Crea una función para resolver la ecuación de segundo grado. Esta función recibe los coeficientes de la ecuación y devuelve un array con las soluciones. 
*Si no hay soluciones reales, devuelve FALSE.
*/
    $a=1;
    $b=-3;
    $c=2;
    
function resultado($a, $b,$c){
    
    $discriminante=($b*$b)-(4*$a*$c);
    if($discriminante<0){
        return false;
    }else if($discriminante==0){
        $solucion=-$b/(2*$a);
        return array($solucion);
    }else if($discriminante>0){
        $solucion1 = (-$b + sqrt($discriminante)) / (2 * $a);
        $solucion2 = (-$b - sqrt($discriminante)) / (2 * $a);
        return array($solucion1, $solucion2);
    }
}

$resultados=resultado($a,$b,$c);
if($resultados===false){
    echo'no hay solucion';
}else{
    if(count($resultados)==1){
        echo 'La solucion es '. $resultados[0];
    }else{
        echo 'La solucion 1 es '. $resultados[0].' y la solucion 2 es '. $resultados[1];
    }
}

?>