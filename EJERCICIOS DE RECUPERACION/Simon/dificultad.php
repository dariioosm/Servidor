<?php
require('conexion.php');
if(isset($_POST['dificultad'])){
    $dificultad= $_POST['dificultad'];
    $update = $conn->prepare("UPDATE nivel SET dificultad = ?");
        $update->bind_param("i", $dificultad);
        $update->execute();

        /*$result = $conn->query("SELECT dificultad FROM nivel");
$row = $result->fetch_assoc();
$dificultad_actual = $row['dificultad'];*/

}
if(isset($_POST['logout'])){
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Menu administrador</h2>
    <form method="post">
        <h2>Selecciona la dificultad del juego</h2>

        <select name="dificultad" id="">
        <option value="3">Facil</option>
        <option value="4">Medio</option>
        <option value="5">Dificil</option>
        </select>
        <button type="submit">Enviar</button>
    </form>
    <form method="post">
        <button type="submit" name="logout">Cierra sesion</button>
    </form>
</body>
</html>

