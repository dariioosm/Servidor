<?php 
session_start();
if(isset($_POST['cambiar_color'])){
    $_SESSION['cambiar_color']=$_POST['cambiar_color'];
}
if(isset($_POST['respuesta'])){
    $respuesta=$_POST['respuesta'];
}else{
    $respuesta='black';
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
            width: 100px; /* Ancho del círculo */
            height: 100px; /* Alto del círculo */
            background-color: <?php  echo $color;?>;
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
    <div class="circulo"></div>
    <form action="#" method="post">
        <input type="submit" name="respuesta" value="rojo">
        <input type="submit" name="respuesta"value="verde">
        <input type="submit" name="respuesta"value="azul">
        <input type="submit" name="respuesta"value=amarillo>
    </form>
</body>
</html>