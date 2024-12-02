<?php 
/*session_start();
if(isset($_POST['cambiar_color'])){
    $_SESSION['cambiar_color']=$_POST['cambiar_color'];
}
if(isset($_POST['respuesta'])){
    $respuesta=$_POST['respuesta'];
}else{
    $respuesta='black';
}
foreach($adivinaColor as $index=>$value){
    
}*/
session_start();

// Si se presiona el botón 'cambiar_color', se asigna un nuevo color aleatorio
if (isset($_POST['cambiar_color'])) {
    $colores = ['red', 'green', 'yellow', 'blue'];
    $_SESSION['color'] = $colores[array_rand($colores)];
}

// Si el usuario elige un color, se asigna a la variable $respuesta
if (isset($_POST['respuesta'])) {
    $respuesta = $_POST['respuesta'];
} else {
    // Si no se ha seleccionado ningún color, asignamos el color guardado en la sesión o un valor predeterminado
    $respuesta = isset($_SESSION['color']) ? $_SESSION['color'] : 'black';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         .circulo {
            display: inline-block;
            width: 100px; /* Ancho del círculo */
            height: 100px; /* Alto del círculo */
            background-color: <?php  echo $respuesta;?>;
            border-radius: 50%; /* Hace que el div sea un círculo */
        }
        .circulo2 {
            display: inline-block;
            width: 100px; /* Ancho del círculo */
            height: 100px; /* Alto del círculo */
            background-color: <?php  echo $respuesta?>;
            border-radius: 50%; /* Hace que el div sea un círculo */
        }
        .circulo3 {
            display: inline-block;
            width: 100px; /* Ancho del círculo */
            height: 100px; /* Alto del círculo */
            background-color: <?php  echo $respuesta;?>;
            border-radius: 50%; /* Hace que el div sea un círculo */
        }
        .circulo4 {
            display: inline-block;
            width: 100px; /* Ancho del círculo */
            height: 100px; /* Alto del círculo */
            background-color: <?php  echo $respuesta;?>;
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
    <!-- Salen los circulos en negro -->
    <div class="circulo"></div>
    <div class="circulo2"></div>
    <div class="circulo3"></div>
    <div class="circulo4"></div>
    
    <form action="#" method="post">
        <input type="submit" name="respuesta" value="rojo">
        <input type="submit" name="respuesta"value="verde">
        <input type="submit" name="respuesta"value="azul">
        <input type="submit" name="respuesta"value=amarillo>

        <?php
            
        ?>
    </form>
</body>
</html>