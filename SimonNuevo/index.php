
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>¡Vamos a jugar al simon!</h1>
    <form action="Inicio.php" method="POST" >
    <label for="">Usuario</label>
    <input type="text" id="user" name="user" required>
    <label for="">Password</label>
    <input type="password" id="pass" name="pass" require>
    <button type="submit">Enviar</button>
    </form>
</body>
</html>
<?php 
session_start();

//? comprueba que los post user y pass contengan informacion
if (isset($_POST['user']) && isset($_POST['pass'])) {
    $_SESSION['user'] = $_POST['user'];
    $_SESSION['pass'] = $_POST['pass'];
}
//TODO agarrar la info del post y guardarlo en variables de sesion y posteriormente, pasarlos a una $ para meterlo en las query de la bbdd

if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
    
$user=$_SESSION['user'];
$pass=$_SESSION['pass'];

}

//? conexion a bbdd con la info del root

$connection = new mysqli('localhost','root','','bdsimon');
$query = "SELECT Nombre, Clave FROM usuarios WHERE Nombre like '$user' AND Clave like '$pass'";
$result=$connection->query($query);
if($result&&$result -> num_rows>0){
    $fila = $result ->fetch_assoc();
    echo "Bienvenido, " . htmlspecialchars($fila['Nombre']) . "!<br>"; 
}else {
    echo "Usuario o contraseña incorrectos.<br>";
}
if(!$result)die ('fatal error');

?>