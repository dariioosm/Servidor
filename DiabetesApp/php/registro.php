<?php 
//TODO conexion a bbdd

$conn= new mysqli('localhost','root','','diabetesdb');

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


//TODO pillar datos del form

if($_SERVER["REQUEST_METHOD"]=="post"){
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $fecha_nacimiento=$_POST['fecha_nacimiento'];
    $user=$_POST['usuario'];
    $pass=$_POST['pass'];

    //TODO comprobacion de datos cumplimentados
    if(empty($nombre)||empty($apellidos)||empty($fecha_nacimiento)||empty($user)||empty($pass)){
        echo "Faltan datos por rellenar";
    }else{
        $inserta=$sql->prepare("INSERT INTO USUARIOS (nombre,apellidos,fecha_nacimiento,login,pass)
            VALUES (?,?,?,?,?)");

        $inserta->bind_param("sssss", $nombre, $apellidos, $fecha_nacimiento, $user, $pass);
        $inserta->close();
        if ($inserta->execute()) {
            echo "Registro exitoso";
        } else {
            echo "Error: " . $inserta->error;
        }
    }

}

$conn->close();
?>