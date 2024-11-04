<?php 
            $colores =['red', 'green', 'yellow', 'blue'];
            $color = 'red';
            if (isset($_POST['cambiar_color'])) {
                $color = $colores[array_rand($colores)];
            }
        ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .circulo {
            width: 100px; /* Ancho del círculo */
            height: 100px; /* Alto del círculo */
            background-color: <?php  echo $colores;?>;
            border-radius: 50%; /* Hace que el div sea un círculo */
        }
        button {
            display: block;
            margin: 0 auto;
            padding: 10px 20px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="circulo">
    <form method="post">
        <button type="submit" name="cambiar_color">Cambiar Color</button>
    </form>
    </div>
</body>
</html>