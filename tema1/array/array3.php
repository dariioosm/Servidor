<?php 
/*
* Calcular la diagonal primaria y secuandaria
*                       ****
*                       ****
*                       ****
*                       ****      
*/

$M= array(
    array(1,0,0,1),
    array(0,1,1,0),
    array(0,1,1,0),
    array(1,0,0,1),
)
//bucle diagonal principal
for($i=0;$i<=3;$i++){
    $principal+=$M[$i][$i];
} 
//bucle diagonal secundaria
for($j=count($M);$j=0;$j--){
    $secundaria+=$M[$j][$j];
}
echo "La suma principal es: $principal y, la suma de la secundaria es: $secundaria"
?>