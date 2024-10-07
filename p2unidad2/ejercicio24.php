<?php 
/*
*Crea un array llamado deportes e introduce los siguientes valores: futbol, baloncesto, natación, tenis. 
*Haz el recorrido de la matriz con un for para mostrar sus valores. 
*A continuación realiza las siguientes operaciones: 
*    Muestra el total de valores que contiene.
*    Sitúa el puntero en el primer elemento del array y muestra el valor actual, es decir, donde está situado el puntero actualmente.
*    Avanza una posición y muestra el valor actual.
*    Coloca el puntero en la última posición y muestra su valor.
*    Retrocede una posición y muestra este valor.
*/
$deportes=array("futbol", "baloncesto", "natación", "tenis");

//TODO vardump de la matriz para la comprobacion del resultado de los echo
echo "vardump de la matriz para la comprobacion del resultado de los echo <br>".var_dump($deportes)."<br>";
//TODO total de valores
echo count($deportes)." Numero de indices en el vector ";

//TODO usar current para indicar donde eseta el programam en ese punto
$actual= current($deportes);
echo  "<br> El puntero está en: ".$actual;
//TODO usar next para avanzar el puntero del programa
$siguiente = next($deportes);
echo "<br> La siguiente posicion del puntero es: ".$siguiente;
//TODO usar end para avanzar el puntero hasta el final del array 
$final = end($deportes);
echo "<br> La posicion final del vector es: ".$final;
//TODO usar prev para sacar el penultimo valor guardado en vector
$penultimo=prev($deportes);
echo "<br> La penultima posicion del vector es: ".$penultimo;

?>