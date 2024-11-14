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
    $numero_aleatorio=rand(1,100);
    $_SESSION['numero_aleatorio']=$numero_aleatorio;
    if(!isset($_SESSION['contador'])){
        $_SESSION['contador']=0;
    }if($_POST['numero']==$_SESSION['numero_aleatorio']){
        echo'<br><br>';
        echo 'Has acertado. El numero era'.$numero_aleatorio;
        echo'<br><br>';
        echo 'Has necesitado '.$_SESSION['contador'].' intentos';
        session_destroy();
        echo '<a href="Ejercicio3.php">Volver a jugar</a>';
    }if($_POST['numero']>$_SESSION['numero_aleatorio']){
        echo'Tu numero es : '.$_POST['numero'].'<br><br>';
        echo'Mi numero es menor <br><br>';
        $_SESSION['contador']++;
        echo '<a href="Ejercicio3.php">Volver a jugar</a>';
    }else{
        echo'Tu numero es : '.$_POST['numero'].'<br><br>';
        echo'Mi numero es mayor <br><br>';
        echo $_SESSION['$numero_aleatorio'];
        $_SESSION['contador']++;
        echo$_SESSION['numero_aleatorio'];
        echo '<a href="Ejercicio3.php">Volver a jugar</a>';
    }
    ?>
    <form action='#' method="post">
    <label for="nombre">Adivina mi numero</label>
    <input type="number" name="numero" min='1' max='100'/>
    </form>

</body>
</html>