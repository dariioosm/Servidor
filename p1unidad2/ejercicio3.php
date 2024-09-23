<?php 
/*
*Determinar la cantidad de dinero que recibirá un trabajador por concepto de las
*horas extras trabajadas en una empresa, sabiendo que cuando las horas de
*trabajo exceden de 40, el resto se consideran horas extras y que estas se pagan al
*doble de una hora normal cuando no exceden de 8; si las horas extras exceden de
*8 se pagan las primeras 8 al doble de lo que se pagan las horas normales y el resto
*al triple.
*/
$horas=50;
$extras=0;
$final=0;
$resto=0;
if($horas>40){
    $extras=$horas-40;
     if($extras<=8){
        echo $horas." horas trabajadas <br>";
        echo $extras." horas que se pagan al doble ";
     }else if($extras>8){
        //$extras;
        $final=$horas-48;
        $resto= $extras-$final;
        echo $horas." horas trabajadas <br>";
        echo $resto." horas que se pagan al doble <br>";
        echo $final." horas que se pagan al triple <br>";
        
     }
    
}
?>