<?php 
/*
*Crear un programa partir de 3 valores, a b y c que corresponden a los tres
*coeficientes de una ecuación de segundo grado muestre las soluciones de la
*misma La solución de la ecuación de segundo grado depende del signo de b2-4ac:
* si b2-4ac es negativo no hay soluciones
* si es nulo, hay sólo una solución -b/2a
* si es positivo, hay dos soluciones: (-b+sqrt(b2-4ac))/(2a) y (-bsqrt(b2-4ac))/(2a)

*/
$a=0;
$b=0;
$c=0;
$solucion1=0;
$solucion2=0;
if(((2*$b)-(4*$a*$c))<0){
echo"No hay soluciones"
}else if(((2*$b)-(4*$a*$c))>=0){
    $solucion1=(-$b+sqrt(2*$b)-(4*$a*$c))/(2*$a);
    $solucion2=(-$b+sqrt(2*$b)+(4*$a*$c))/(2*$a);
    echo $solucion1;
    echo $solucion2;
}else if(((2*$b)-(4*$a*$c))!==0){
    $solucion1=-$b/2$a;
    echo $solucion1;
}
?>