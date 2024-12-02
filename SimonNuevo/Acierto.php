<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simon</title>
    <style>
        svg{
            margin: 10px;
        }
    </style>
</head>
<body>
    <h4>Simon</h4>
    <h6>Has acertado la combinacion</h6>
    <?php
    session_start();
    function pintar_ciculos($colors){
        for($i=0;$i<3;$i++){
            echo'<svg width="100" height="100">';
            echo '<circle id="circle'.($i+1).'" cx="50" cy="50" r="40" fill="'.$colors[$i].'"></circle>';
            echo '</svg>';
        }
    }
    session_destroy();
    ?>
    <a href="Inicio.php">
        Volver al juego
    </a>
</body>
</html>