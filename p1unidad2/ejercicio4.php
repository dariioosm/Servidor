<?php 
/*
*Identificar entre dos números aleatorios cual es el mayor y si este es par o impar.
*Buscar información previamente para generar números aleatorios y usarla para
*resolver el ejercicio.
*/
$numero1= rand(0,100);
$numero2= rand(0,100);
if($numero1>$numero2){
    if($numero1%2==0){
        echo $numero1." es mayor que ". $numero2." y ademas es par";
    }
    else{
        echo $numero1." es mayor que ". $numero2." y ademas es impar";
    }
}else{
    if($numero2%2==0){
        echo $numero2." es mayor que ". $numero1." y ademas es par";
    }
    else{
        echo $numero2." es mayor que ". $numero1." y ademas es impar";
    }
}

?>