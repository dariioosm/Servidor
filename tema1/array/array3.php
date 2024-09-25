<?php 
/*
* Calcular la diagonal primaria y secuandaria
*                       ****
*                       ****
*                       ****
*                       ****      
*/
$principal=0;
$secundaria=0;
$M= array(
    array(1,0,0,2),
    array(0,1,1,0),
    array(0,1,1,0),
    array(2,0,0,1),
);
/*
//bucle diagonal principal
for($i=0;$i<=3;$i++){
    $principal= $principal+ $M[$i][$i];
}
//bucle diagonal secundaria
//-i,+j;


 

for($j=3;$j>=0;$j--){
    
    $secundaria = $secundaria +$M[$j][3-$j];
    
}
echo "La suma principal es: $principal <br> La suma de la secundaria es: $secundaria"
*/

//resolucion con un bucle
for($i=0; $i<=3;$i++){
    $principal=$principal+$M[$i][$i];
    $secundaria=$secundaria+$M[$i][3-$i];
}
echo "La suma principal es: $principal <br> La suma de la secundaria es: $secundaria"

?>