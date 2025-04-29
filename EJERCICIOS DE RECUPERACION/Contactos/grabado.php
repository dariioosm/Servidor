<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Agenda</h1><br>
    <h2>Hola <?php echo htmlspecialchars($_SESSION['usuario']);?> </h2><br>
    <p>Se han grabado tus <?php echo htmlspecialchars($_SESSION['incrementos'])?> contactos :D</p><br>
    <a href="login.php">Volver a loguearse</a> <br>
    <a href="agenda.php">Agregar mas contactos para <?php echo htmlspecialchars($_SESSION['usuario']);?></a><br>
    <a href="totales.php">Total de contactos guardados</a>

</body>
</html>