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
    $numero_aleatorio=3;
    if(!isset($_SESSION['contador'])){
        $_SESSION['contador']=0;
    }if($_POST['numero']==$numero_aleatorio){
        echo'<br><br>';
        echo 'Has acertado. El numero era'.$numero_aleatorio;
        echo'<br><br>';
        echo 'Has necesitado '.$_SESSION['contador'].' intentos';
        session_destroy();
    }if($_POST['numero']>$numero_aleatorio){
        echo'Tu numero es : '.$_POST['numero'].'<br><br>';
        echo'Mi numero es menor <br><br>';
        $_SESSION['contador']++;
    }else{
        echo'Tu numero es : '.$_POST['numero'].'<br><br>';
        echo'Mi numero es mayor <br><br>';
        $_SESSION['contador']++;
    }
    ?>
    <form action='#' method="post">
    <label for="nombre">Adivina mi numero</label>
    <input type="number" name="numero"/>
    </form>

</body>
</html>