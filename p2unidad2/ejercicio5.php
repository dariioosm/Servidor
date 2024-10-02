<?php 
/*
*Generar de forma aleatoria una matriz de 3x5 con valores numéricos.
*a. Imprimir todos los elementos en forma sucesiva tomándolos por fila.
*b. Igual al anterior pero por columna.
*/

//TODO generacion de la matriz con numero aleatorios

$matriz = array();

for($i=0;$i<3;$i++){
    for($j=0;$j<5;$j++){
        $matriz[$i][$j]=rand(1,15);
    }
}

//TODO impresion de matriz
for($i=0;$i<3;$i++){
    for($j=0;$j<5;$j++){
        echo $matriz[$i][$j]."\t";
    }
    echo "<br/>";
}
//TODO apartado a

?>