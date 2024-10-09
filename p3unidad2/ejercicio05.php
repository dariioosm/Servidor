<?php 
/*
*Escribe un script para probar algunas de las funciones mostradas debajo, el script ha de contener al menos tres funciones de cada bloque
*   Funciones de variables
*       isset($var) TRUE si la variable está inicializada y no es NULL
*       is_null($var) TRUE si la variable es NULL
*       empty($var) TRUE si la variable no está inicializada o su valor es FALSE Para comprobar el tipo de dato de $var
*       is_int($var), is_float($var), Para comprobar el tipo de dato de $var
*       is_bool($var), is_array($var) Para comprobar el tipo de dato de $var
*       intval($var), floatval($var), boolvar($var), strval($var) Para obtener el valor de $var como otro tipo de dato

*   Funciones de cadenas
*        strlen($cad) Devuelve la longitud de $cad
*        explode($cad, $token) Parte una cadena utilizando $token como separador. Devuelve un array de cadenas
*        implode($token, $array) Crea una cadena larga a partir de un array de cadenas, entre cadena y cadena se introduce $token
*        strcmp($cad1, $cad2) Compara las dos cadenas. Devuelve 0 si son iguales, -1 si $cad1 es menor y 1si $cad1 es mayor
*        strtolower($cad), Devuelven $cad en mayúsculas o minúsculas, respectivamente
*        strtoupper($cad)  Devuelven $cad en mayúsculas o minúsculas, respectivamente
*        str($cad1, $cad2) Busca la primera ocurrencia de $cad2 en $cad1. Si no aparece devuelve FALSE, si aparece devuelve $cad1 desde donde comienza la ocurrencia

*   Funciones de array
*       ksort($arr), krsort($arr) Ordena el array por clave en orden ascendente o descendente
*       sort($arr), rsort($arr) Ordena el array por valor en orden ascendente o descendente Devuelve los valores de $arr
*       array_values($arr) Devuelve los valores de $arr
*       array_keys($arr) Devuelve las claves de $arr
*       array_key_exists($arr, $cla) Devuelve verdadero si algún elemento de $arr tiene clave $cla Devuelve el número de elementos del array
*       count($arr) Devuelve numero de elementos de array
*/
//TODO funciones de variables

$var = 'hola';
echo '<br>';
echo isset($var) ? 'true' : 'false';
echo '<br>';
echo is_null($var) ? 'true' : 'false';
echo '<br>';
echo is_array($var) ? 'true' : 'false';
echo '<br>';
//TODO funciones de cadenas
$cad1 = "jibiri";
$cad2 = 'holiwii';
echo '<br>';
echo strlen($cad1);
echo '<br>';
echo strtoupper($cad2);
echo '<br>';
echo strcmp($cad1, $cad2);
echo '<br>';
//TODO funciones de array
$arr = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
echo '<br>';
rsort($arr);
print_r($arr);
echo '<br>';
print_r(array_keys($arr));
echo '<br>';
print_r(array_values($arr));

?>