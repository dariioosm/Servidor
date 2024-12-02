<?php 
            session_start();
            $colores =['red', 'green', 'yellow', 'blue'];
            $color = $colores[array_rand($colores)];
            $color2 = $colores[array_rand($colores)];
            $color3 = $colores[array_rand($colores)];
            $color4 = $colores[array_rand($colores)];
            if (isset($_POST['cambiar_color'])) {
                $color = $colores[array_rand($colores)];
            }
            $_SESSION['adivinar']=$colores[array_rand(($colores))];
            $_SESSION['colores']=$colores;
        ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .circulo {
            display: inline-block;
            width: 100px; /* Ancho del círculo */
            height: 100px; /* Alto del círculo */
            background-color: <?php  echo $color;?>;
            border-radius: 50%; /* Hace que el div sea un círculo */
        }
        .circulo2 {
            display: inline-block;
            width: 100px; /* Ancho del círculo */
            height: 100px; /* Alto del círculo */
            background-color: <?php  echo $color2;?>;
            border-radius: 50%; /* Hace que el div sea un círculo */
        }
        .circulo3 {
            display: inline-block;
            width: 100px; /* Ancho del círculo */
            height: 100px; /* Alto del círculo */
            background-color: <?php  echo $color3;?>;
            border-radius: 50%; /* Hace que el div sea un círculo */
        }
        .circulo4 {
            display: inline-block;
            width: 100px; /* Ancho del círculo */
            height: 100px; /* Alto del círculo */
            background-color: <?php  echo $color4;?>;
            border-radius: 50%; /* Hace que el div sea un círculo */
        }
        button {
            display: block;
            margin: 0 auto;
            padding: 10px 20px;
            font-size: 16px;
            margin-left: 20px;
        }
    </style>
</head>
<body>
    
    <form action="responde.php" method="post">
    <div class="circulo"></div>
    <div class="circulo2"></div>
    <div class="circulo3"></div>
    <div class="circulo4"></div>
        <button type="submit" name="jugar" value="jugar">Jugar</button>
    </form>
    </div>
</body>
</html>