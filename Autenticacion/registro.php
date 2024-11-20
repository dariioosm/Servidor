<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="prueba2.php" method="post">
        <label for="">Usuario</label>
        <input type="text" name='user' id="user" require>
        <br><br>
        <label for="">Contraseña</label>
        <input type="password" name="passwd" id="passwd" require>
        <br><br>
        <label for="">Confirmacion de contraseña</label>
        <input type="password" name="passwd2" id="passwd2" require>
        <br><br>
        <label for="">Rol</label>
        <br><br>
        <label for="">Estandar</label>
        <input type="radio" name="std" id="std">
        <label for="">Prime</label>
        <input type="radio" name="prime" id="prime">
        <br> <br>
        <input type="submit" value="Registrarse">
    </form>
</body>
</html>