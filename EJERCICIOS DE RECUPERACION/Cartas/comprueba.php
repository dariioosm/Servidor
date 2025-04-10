<?php

/*
* lo que recojo del post es el indice del vector donde se encuentra la carta
*le resto uno, para que entre en el rango del vector (0-5)
* el contenido del array en los indices que indica el usuario los guardo en una nueva variable, que comparo
*/
require 'conexion.php';
session_start();
$x=$_POST['x']-1;
$y=$_POST['y']-1;

$intentos=$_SESSION['levantadas'];
$solucion=$_SESSION['solucion'];

$respuestax=$_SESSION['solucion'][$x];
$respuestay =$_SESSION['solucion'][$y];
 var_dump($solucion);
echo 'Valor del primer valor'.$respuestax;
echo 'Valor del segundo valor'.$respuestay;

//TODO hacer la suma de los intentos a la tupla extra (es requerido independientemente del aciero o fallo)

//?procedimiento del select para poder actulizar
$extra= $conn->prepare('SELECT extra FROM jugador where login = ?');
$extra->bind_param('s',$_SESSION['usuario']);
$extra->execute();
$resultadoextra=$extra->get_result();
$filaextra = $resultadoextra->fetch_assoc();
$totalintentos=intval($fila['extra']);

$nuevosintentos=$totalintentos+$_SESSION['levantadas'];

//?update de la tupla con el nuevo resultado

$update= $conn->prepare('UPDATE jugador SET extra = ? WHERE login = ?')


if($respuestax==$respuestay){
    
}else{

}

?>