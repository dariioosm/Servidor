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
        <input type="text" name='user' id="user" required>
        <br><br>
        <label for="">Contraseña</label>
        <input type="password" name="passwd" id="passwd" required>
        <br><br>
        <label for="">Confirmacion de contraseña</label>
        <input type="password" name="passwd2" id="passwd2" required>
        <br><br>
        <label for="">Rol</label>
        <br><br>
        <label for="">Estandar</label>
        <input type="radio" name="rol" id="std" value="std">
        <label for="">Prime</label>
        <input type="radio" name="rol" id="prime" value="prime">
        <br> <br>
        <input type="submit" value="Registrarse">
    </form>
</body>
</html>