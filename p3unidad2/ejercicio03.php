<?php 
/*
*Escribe una función que reciba una cadena y comprueba si es un palíndromo
*/

$entrada="panama amanap";
echo $entrada."<br>";
function palindromo($entrada){
    if($entrada==strrev($entrada)){
        return true;
    }else{
        return false;
    }
}
if (palindromo($entrada)){
    echo"$entrada es un palindromo";
}else{
    echo"$entrada no es un palindromo";
}


?>