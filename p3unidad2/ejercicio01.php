<?php
/*
*Crea una función para resolver la ecuación de segundo grado. Esta función recibe los coeficientes de la ecuación y devuelve un array con las soluciones. 
*Si no hay soluciones reales, devuelve FALSE.
*/
    $a=6;
    $b=7;
    $c=8;
    $is_real=true;
    $solucion1=0;
    $solucion2=0;
    
function resultado($a, $b,$c){
    
    if(((2**$b)-(4*$a*$c))<0){
        $is_real=false;
    }else if(((2**$b)-(4*$a*$c))>=0){
        $solucion1=(-$b+sqrt(2*$b)-(4*$a*$c))/(2*$a);
        $solucion2=(-$b+sqrt(2*$b)+(4*$a*$c))/(2*$a);
        //$is_real=true;
    }else if(((2**$b)-(4*$a*$c))!==0){
        $solucion1=-$b/(2*$a);
        //$is_real=true;
    }
    return array($solucion1,$solucion2);
}
$resultados=resultado($a,$b,$c);

if($is_real=false){
    echo "no hay soluciones posibles";
}else{
    if(count($resultados)==1){
        echo $resultados[0];
    }else{
        echo $resultados[0].' y '.$resultados[1];
    }
}
?>