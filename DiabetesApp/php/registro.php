<?php 
//TODO conexion a bbdd
session_start();
$conn= new mysqli('localhost','root','','diabetesdb');

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


//TODO pillar datos del form

if(isset($_POST)){
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $fecha_nacimiento=$_POST['fecha_nacimiento'];
    $user=$_POST['usuario'];
    $pass=$_POST['pass'];

    //TODO comprobacion de datos cumplimentados
    if(empty($nombre)||empty($apellidos)||empty($fecha_nacimiento)||empty($user)||empty($pass)){
        echo "Faltan datos por rellenar";
    }else{
        //TODO comprobacion que no existe el alias del usuario
        $existeuser= $conn -> prepare('SELECT * FROM usuarios WHERE login=?');
        $existeuser->bind_param('s',$user);
        $existeuser->execute();
        $resultado=$existeuser->get_result();
        if($resultado ->num_rows>0){
            echo 'El nombre de usuario ya esta registrado';
        }else{
            
        //? $conn es el parametro de conexion a la bbdd y si no se usa, no se ejecutan sentencias
        $inserta=$conn->prepare("INSERT INTO usuarios (nombre,apellidos,fecha_nacimiento,login,pass)
        VALUES (?,?,?,?,?)");

    $inserta->bind_param("sssss", $nombre, $apellidos, $fecha_nacimiento, $user, $pass);
        if ($inserta->execute()) {
        echo "Registro exitoso";
        $_SESSION['usuario']=$user;
        header('./home.php');
        exit();
        
         } else {
        echo "Error: " . $inserta->error;
             }
             $inserta->close();
        }
        $existeuser->close();
        
    }
}

$conn->close();
?>