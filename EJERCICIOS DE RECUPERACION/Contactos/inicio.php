<?php
require 'conexion.php';
session_start();
if($_SESSION['incrementos'] != null){
    unset($_SESSION['incrementos']);
}


if (!isset($_SESSION['incrementos'])) {
    unset($_SESSION['incrementos']);
    $_SESSION['incrementos'] = 0;
}

$imagenes = [0, 1, 2, 3, 4];
$pinta = rand(0, 4);


if (isset($_POST['incrementar'])) {
    if ($_SESSION['incrementos'] < 5) {
        $_SESSION['incrementos']++;
    }

    if ($_SESSION['incrementos'] == 5) {
        header('Location: agenda.php');
        exit;
    }
}

if (isset($_POST['grabar'])) {
    if ($_SESSION['incrementos'] >= 1 && $_SESSION['incrementos'] < 5) {
        header('Location: agenda.php');
        exit;
    } 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <p>
        Hola, <?php echo $_SESSION['usuario'] ?> ¿Cuantos contactos deseas grabar? <br>
        Puedes grabar entre 1 y 5. Por cada pulsacion en Incrementar, grabarias un usuario más  <br>
        Cuando el número sea el deseado pulsa GRABAR
     </p>   
        <?php
            for($i=0;$i<$_SESSION['incrementos'];$i++){
                echo "<img src='{$imagenes[$pinta]}.jfif' width='150px' height='200px' alt=''>";
            }
        
        ?>

        

     <form action="" method="post">
        <button type="submit" name="incrementar">Incrementar</button>
        <button type="submit" name="grabar">Grabar</button>
     </form>
</body>
</html>