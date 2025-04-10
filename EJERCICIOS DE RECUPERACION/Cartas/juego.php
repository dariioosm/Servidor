<?php 
session_start();
$_SESSION['levantadas']=0;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo '<h1> Bienvenido '. $_SESSION['usuario'].'</h1> '; ?>
    <h2>Cartas levantadas: <?php echo $_SESSION['levantadas'];?></h2>
        <form action="#" method="post">
            <button type="submit" value="0">Levanta la carta 1</button>
            <button type="submit"value="1">Levanta la carta 2</button>
            <button type="submit"value="2">Levanta la carta 3</button>
            <button type="submit"value="3">Levanta la carta 4</button>
            <button type="submit"value="4">Levanta la carta 5</button>
            <button type="submit"value="5">Levanta la carta 6</button>
        </form>
        <form action="comprueba.php" method="post">
            <h1>Pareja</h1>
            <input type="number" name="x" id="x">
            <input type="number" name="y" id="y">
        </form>

</body>
</html>