<?php
if(isset($_POST['nombre'])){
    echo "Nombre". $_POST['nombre'];
    echo "Apellido". $_POST['apelido'];


}else{

echo <<< _END
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Fichero2.php" method="post">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre"><br><br>

        <label for="apellido">Apellido:</label><br>
        <input type="text" id="apellido" name="apellido" ><br><br>


        <input type="submit" value="Enviar">
    </form>
</body>
</html>
_END;
}


?>