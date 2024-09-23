<?php 
/* hacer un vector mediante bucle 10 20 30 40 50 y sacar promedio */
$promedio=0;
$suma=0;
for($i=1;$i<=5;$i++){
$M[$i]=$i*10;
$suma+=$M[$i];
}
$promedio=$suma/count($M);
var_dump($M);
echo "<br>";
echo $promedio;


?>