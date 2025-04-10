<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
require 'conexion.php';
session_start();
require 'pintacirculo.php';

//TODO hacer el contador
if(!isset($_SESSION['contador'])){
    
    $_SESSION['contador']=0;
    //$_SESSION['respuesta']=['black','black','black','black','black'];

    for($i=0;$i<$_SESSION['nivel'];$i++){
        $_SESSION['respuesta'][$i]='black';
    }

}if (isset($_POST['color']) && $_SESSION['contador'] < $_SESSION['nivel']) {
    $_SESSION['respuesta'][$_SESSION['contador']] = $_POST['color']; //? asigna el color del boton a un indice del array en el que se guarda la respuesta
    $_SESSION['contador']++;
}
rellenaCirculo($_SESSION['respuesta']);

if ($_SESSION['contador'] >= $_SESSION['nivel']) {
    //TODO hacer los location a las paginas de acierto/fallo
    echo "<h3>Combinación correcta:</h3>";
    rellenaCirculo($_SESSION['combinacion']);

        $codigo = $conn->prepare('SELECT Codigo FROM usuarios WHERE Nombre = ?');
        $codigo->bind_param('s', $_SESSION['usuario']);
        $codigo->execute();
        $resultadoCodigo = $codigo->get_result();
        $fila = $resultadoCodigo->fetch_assoc();
        $codigoUsuario = $fila['Codigo'];
 
        if($_SESSION['respuesta'] == $_SESSION['combinacion']){
            $esAcierto = 1;
        }else{
            $esAcierto =0;
        }
        $insert = $conn->prepare('INSERT INTO jugadas (codigousu, acierto) VALUES (?, ?)');
        $insert->bind_param('ii', $codigoUsuario, $esAcierto);
        $insert->execute();

    if ($_SESSION['respuesta'] === $_SESSION['combinacion']) {
        header('Location:acierto.php');
    } else {
        header('Location: fallo.php');
    }
}
?>

<form action="#" method="post">
        <button type='submit' name='color' value='red'>Rojo</button>
        <button type='submit' name='color' value='green'>Verde</button>
        <button type='submit' name='color' value='yellow'>Amarillo</button>
        <button type='submit' name='color' value='blue'>Azul</button>
</form>
</body>
</html>