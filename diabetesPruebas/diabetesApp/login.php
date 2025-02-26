<?php
    require 'conexion.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
       $login=$_POST['login'];
       $password=$_POST['passwd'];
       $stmt=$pdo->prepare("SELECT * FROM USUARIOS WHERE login =?");
       $stmt->execute([$login]);
       $user=$stmt->fetch();

       echo "Usuario: " . $user['login'] . "<br>";
       echo "Contraseña: " . $user['pass'] . "<br>";

       if($user && password_verify($password,$user['pass'])){
        $_SESSION['user_id']=$user['login'];
        header('Location:informacion.php');
        exit;
       }else{
        echo 'Error de autenticación';
       }
    }
?>
<form action="" method="post">
    <input type="text"name="login" placeholder="login" required/>
    <input type="password" name="passwd" placeholder="contraseña"required/>
    <button type="submit">Enviar</button>
</form>