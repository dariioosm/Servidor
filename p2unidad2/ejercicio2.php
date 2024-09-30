<?php 
/*
*Crea el código que dé respuesta al siguiente planteamiento:
*Queremos almacenar en una matriz el número de alumnos con el que cuenta una
*academia, ordenados en función del nivel y del idioma que se estudia. Tendremos
*3 filas que representarán al Nivel básico, medio y de perfeccionamiento y 4
*columnas en las que figurarán los idiomas (0 = Inglés, 1 = Francés, 2 = Alemán y 3 = Ruso). 
*Mostrar por pantalla los alumnos que existen en cada nivel e idioma.
*       [0] [1] [2] [3]
*   [0]  1   14  8   3
*   [1]  6   19  7   2
*   [2]  3   13  4   1
*/
$basico=0;
$medio=0;
$perfe=0;
$alumnos=array(
                array(1,14,8,3),
                array(6,19,7,2),
                array(3,13,4,1),
);

/*
TODO suma por filas para saber numero de alumnos por nivel
*/
for($i=0;$i<count($alumnos);$i++){
    for($j=0;$j<count($alumnos[$i]);$j++){
    $basico+=$alumnos[0][$j];
    $medio+=$alumnos[1][$j];
    $perfe+=$alumnos[2][$j];
    }
    
}
echo "El total de los alumnos en nivel básico es: ".$basico." en nivel medio: ".$medio." en nivel perfeccionamiento: ".$perfe;
echo"<br>";

/*
TODO suma por columnas para saber numero de alumnos por idioma
*/
$ingles=0;
$aleman=0;
$frances=0;
$ruso=0;
for($l=0;$l<=count($alumnos);$l++){
    for($k=0;$k<4;$k++){
        $ingles+=$alumnos[$l][0];
        $aleman+=$alumnos[$l][1];
        $frances+=$alumnos[$l][2];
        $ruso+=$alumnos[$l][3];
    }
}
echo "El total de los alumnos en inglés es: ".$ingles." en alemán: ".$aleman." en francés: ".$frances." y, en ruso: ".$ruso;

?>