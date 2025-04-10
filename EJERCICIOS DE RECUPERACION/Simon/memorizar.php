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
    require('pintacirculo.php');
    //TODO sentencia sql para recoger el numero de circulos que hay por dificultad

    $dificultad= $conn->prepare('SELECT dificultad FROM nivel');
    $dificultad->execute();
    $resultadoDificultad=$dificultad->get_result();
    $resultado=$resultadoDificultad->fetch_assoc();
    $nivel=$resultado['dificultad'];
    
    $_SESSION['nivel']=$nivel;

    echo '<h1>Memoriza la combinacion '.$_SESSION['usuario'].'</h1>';
    //? limpio el contenido de respuesta y de contador
    unset($_SESSION['respuesta']);
    unset($_SESSION['contador']);
    
    $paleta_colores=['red','green','yellow','blue'];


    for($i=0;$i<$_SESSION['nivel'];$i++){
        $indice=rand(0,3);
        $relleno=$paleta_colores[$indice];
        $colores[]=$relleno;
    }

    //? guardo la combinacion creada en un session
    $_SESSION['combinacion']=$colores;
    
    rellenaCirculo($colores);
    ?>
    <form action ="jugar.php" method='post'>
    <input type='submit' value='jugar'></input>
    </form>
</body>
</html>