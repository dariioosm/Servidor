<?php
/*
*Hacer un algoritmo que llene una matriz de 10x10 con valores aleatorios y
*determine la posición [fila, columna] del número mayor almacenado en la matriz
*/
$matriz=array();
for($i=0;$i<9;$i++){
    for($j=0;$j<9;$j++){
        $matriz[$i][$j]=rand(1,100);
        echo $matriz[$i][$j]."\t";
    }
    echo"<br>";
}

$max=$matriz[0][0];
$fila=0;
$columna=0;
for($k=0;$k<4;$k++){
    for($l=0;$l<5;$l++){
        if($matriz[$k][$l]>$max){
           $max= $matriz[$k][$l];
           $fila=$k;
           $columna=$l;
        }
    }
}
echo $max." se encuentra en fila ".($fila+1)." y columna ".($columna+1);
?>