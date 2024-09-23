<?php 
/* 
caragar vector con valores 10 20 30 40 50 mediante bucle y que haga promedio del contenido del vector

*/
$promedio=0;
$suma=0;
for($i=1;$i<=5;$i++){
$M[$i]=$i*10;
$suma=$M[$i]++;
$promedio=$suma/count($M);
}var_dump($M);
echo'<br>';
echo $promedio;
?>