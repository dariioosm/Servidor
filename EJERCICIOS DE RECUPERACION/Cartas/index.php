<?php /*
$cartas=[2,2,3,3,5,5];
shuffle($cartas);
for($i=0;$i<6;$i++){
    echo $cartas[$i];
}*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <label for="">Usuario<input type="text" name="usuario"></label>
        <label for="">Contraseña<input type="password" name="pass"></label>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
<?php
require('conexion.php');
session_start();
if(isset($_POST['usuario'])&&isset($_POST['pass'])){
    $_SESSION['usuario']=$_POST['usuario'];

    $usuario=$conn->prepare('SELECT login,clave from jugador where login = ? and clave = ?');
    $usuario->bind_param('si',$_SESSION['usuario'],$_POST['pass']);
    $usuario->execute();
    
    $resultado= $usuario->get_result();
    if($resultado && $resultado -> num_rows>0){
        header('Location: juego.php');
    }else{
        echo'Usuario o contraseña incorrectos';
    }
    if(!$resultado){
        die('Fatal error');
    }
}
?>