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

$usuario=$_SESSION['usuario'];

$intentos=$_SESSION['levantadas'];
$solucion=$_SESSION['solucion'];

$respuestax=$_SESSION['solucion'][$x];
$respuestay =$_SESSION['solucion'][$y];
// var_dump($solucion);
//echo 'Valor del primer indice'.$respuestax;
//echo 'Valor del segundo indice'.$respuestay;

//TODO hacer la suma de los intentos a la tupla extra (es requerido independientemente del aciero o fallo)

//?procedimiento del select para poder actulizar
$extra= $conn->prepare('SELECT extra FROM jugador where login = ?');
$extra->bind_param('s',$_SESSION['usuario']);
$extra->execute();
$resultadoextra=$extra->get_result();
$filaextra = $resultadoextra->fetch_assoc();
$totalintentos=intval($filaextra['extra']);

$nuevosintentos=$totalintentos+$_SESSION['levantadas'];

//?update de la tupla con el nuevo resultado

/*
* Se podria hacer UPDATE jugador SET extra = extra + ? WHERE login = ?
* para luego pasarle la variable de sesion con n intentos y sumarlo en la sentencia SQL
* y ahorrame todas las lineas del SELECT
*/

$update= $conn->prepare('UPDATE jugador SET extra = ? WHERE login = ?');
$update->bind_param('is',$intentos,$_SESSION['usuario']);
$update->execute();


if($respuestax==$respuestay){
  
    /* $puntos=$conn->prepare('SELECT puntos FROM jugador WHERE jugador = ?');
    $puntos->bind_param('s',$_SESSION['usuario']);
    $puntos->execute();
    $resultadopuntos=$puntos->get_result();
    $filapuntos = $resultadopuntos->fetch_assoc();
    $totalpuntos=intval($filapuntos['puntos']);
    $nuevospuntos = $totalpuntos+1;*/

    //?con el update puntos=puntos +/-1 nos ahorramos hacer un select del valor y luego hacer la suma en PHP


    $updatepuntos= $conn->prepare('UPDATE jugador SET puntos = puntos + 1 WHERE login = ?');
    $updatepuntos->bind_param('s',$usuario);
    $updatepuntos->execute();
    $updatepuntos->close();

    $mensaje= 'Has acertado posiciones '.$respuestax.' y '.$respuestay.' despues de '.$_SESSION['levantadas'].' intentos';
    $mensaje2='Se te sumará un punto y se sumarán '.$_SESSION['levantadas'].' intentos';
}else{
    /*
    $fallos=$conn->prepare('SELECT puntos FROM jugador WHERE jugador = ?');
    $fallos->bind_param('s',$_SESSION['usuario']);
    $fallos->execute();
    $resultadofallos=$fallos->get_result();
    $filafallos = $resultadofallos->fetch_assoc();
    $totalfallos=intval($filafallos['puntos']);
    $nuevosfallos = $totalfallos-1;*/


    $updatefallos= $conn->prepare('UPDATE jugador SET puntos = puntos -1 WHERE login = ?');
    $updatefallos->bind_param('s',$usuario);
    $updatefallos->execute();
    $updatefallos->close();
    $mensaje= 'Has fallado posiciones '.$respuestax.' y '.$respuestay.' despues de '.$_SESSION['levantadas'].' intentos.';
    $mensaje2='Se te restará un punto y se sumarán '.$_SESSION['levantadas'].' intentos';
}
//TODO hacer la seleccion de las tuplas login, aciertos y extra para meter los datos en tabla

$datos = $conn-> prepare('SELECT nombre,login,puntos,extra FROM jugador');
$datos -> execute();
$resultado = $datos ->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
     table {
            border: 1px solid black;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
        }
</style>
<body>
    <h2>Bienvenido <?php echo $_SESSION['usuario'];?> </h2>
    <br>
    <p> <?php echo $mensaje?> </p>
    <br>
    <p> <?php echo $mensaje2?> </p>
    <br>
    <table>
        <h3>Puntuacion de los jugadores</h3>
        <th>
            
            <!-- <td>Login</td> -->
            <td>Puntos</td>
            <td>Extra</td>
        </th>
        <?php
            $filas= $resultado->num_rows;
            for($i=0;$i<$filas;$i++){
                $resultado-> data_seek($i);
                $dato = $resultado->fetch_assoc();
                $nombre=htmlspecialchars( $dato['nombre']);
                $alias=htmlspecialchars($dato['login']);
                $puntuacion=intval($dato['puntos']);
                $numerointentos=intval($dato['extra']);

                echo '';
              //  echo "<td>{$nombre}</td>";
                echo '<tr><td>'.$alias.'</td>';
                echo '<td>'.$puntuacion.'</td>';
                echo '<td>'.$numerointentos.'</td> </tr>';
              //  echo'';
            }
        ?>
    </table>
</body>
</html>
<?php
$conn->close();
?>