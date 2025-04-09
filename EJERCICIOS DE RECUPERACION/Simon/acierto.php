<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Enhorabuena <?php echo $_SESSION['usuario'] ?> has acertado</h1>
    <?php
        require('pintacirculo.php');
        rellenaCirculo($_SESSION['respuesata']);
        rellenaCirculo($_SESSION['combinacion']);
    ?>
    
</body>
</html>