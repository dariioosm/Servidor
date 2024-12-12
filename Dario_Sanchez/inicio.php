<?php 
require_once 'conexion.php';
session_start();
//TODO coger el nombre de login y contrastarlo con la bbdd para que pille el nombre de usuario y lo muestre
$_POST['login']=  $_SESSION['login'];
$user =$_SESSION['login'];
$conn = new mysqli($servername, $username, $password, $dbname);

$consulta="SELECT nombre from jugador where 'login' like '$user'";
$nombre=$conn->query($consulta);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Bienvenido <?php echo $user ?></h2> <br> <br>
    <img src="imagen/20241212.jpg" alt="">
    <form action="resultado.php">
        <label for="solucion"> Solucion Jeroglifico</label> <input type="text" name="respuesta" id="respuesta">
        <button type="submit">Enviar</button>
    </form>
    <a href="puntos.php">Ver puntos por jugador</a>
    <a href="resultado.php">Resultados del dia</a>
</body>
</html>
