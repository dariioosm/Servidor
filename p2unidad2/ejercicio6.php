<?php 
/*
*Generar de forma aleatoria una matriz de 4*5 con valores numéricos, determinar fila y columna del elemento mayor
*/

$matriz=array();

for($i=0;$i<4;$i++){
    for($j=0;$j<5;$j++){
        $matriz[$i][$j]=rand(0,20);
    }
}


for($i=0;$i<4;$i++){
    for($j=0;$j<5;$j++){
        echo $matriz[$i][$j]."\t";
    }
    echo "<br>";
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