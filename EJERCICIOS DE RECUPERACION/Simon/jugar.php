<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();
function dibujar_circulos($pinta){
    for($i=0;$i<4;$i++){
        echo'<svg width="100" height="100">';
        echo'<circle id="circulo'.($i+1).'" cx="50" cy="50" r="40" fill="'.$pinta[$i].'"></circle>';
        echo'</svg>';
    }
}
//TODO hacer el contador
if(!isset($_SESSION['contador'])){
    $_SESSION['contador']=0;
    $_SESSION['respuesta']=['black','black','black','black'];
    $_SESSION['correcto']=$_SESSION['combinacion'];
}else{
    //!como poner los colores por orden de pulsacion
    $_SESSION;
    $_SESSION['contador']++;
}
?>
<form action="" method="post">
        <button type='submit' name='color' value='red'>Rojo</button>
        <button type='submit' name='color' value='green'>Verde</button>
        <button type='submit' name='color' value='yellow'>Amarillo</button>
        <button type='submit' name='color' value='blue'>Azul</button>
</form>
</body>
</html>