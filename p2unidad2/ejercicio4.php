<?php 

/*
*Genera una matriz de 4*4 de forma aleatoria con números enteros desordenados
*mostrar en un renglón los elementos almacenados en la diagonal principal y en el
*siguiente los de la diagonal secundaria.
*/

//TODO carga de la matriz a través de for con numeros aleatorios
$matriz = array();
for($i=0; $i<4;$i++){
    for($j=0;$j<4;$j++){
        $matriz[$i][$j]=rand(1,16);
    }
}

//TODO impresion de la matriz para su posterior comprobacion
for($i=0; $i<4;$i++){
    for($j=0;$j<4;$j++){
        echo $matriz[$i][$j]."\t ";
    }
    echo "<br>";
}


//TODO ver los datos de la diagonal principal
echo "<h4>Diagonal Principal</h4>";
for($l=0;$l<4;$l++){
    echo $matriz[$l][$l]."\t";
}
echo"<br/>";
echo "<h4>Diagonal Secundaria</h4>";
//TODO ver los datos de la diagonal secundaria
for($k=0;$k<4;$k++){
    echo $matriz[$k][3-$k]."\t";
}

?>