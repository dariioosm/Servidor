<?php 
require 'conexion.php';

//TODO pillar datos del form
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = trim($_POST['nombre']);
    $apellidos = trim($_POST['apellidos']);
    $fecha_nacimiento = $_POST['fecha_nacimiento']; // Formato esperado: d/m/Y
    $user = trim($_POST['usuario']);
    $pass = trim($_POST['pass']);
    $pass2 = trim($_POST['pass2']);
   
    //TODO comprobacion de datos cumplimentados
    if(empty($nombre) || empty($apellidos) || empty($fecha_nacimiento) || empty($user) || empty($pass) || empty($pass2)){
        echo "Faltan datos por rellenar";
        exit();
    }

    //TODO confirmacion de contraseña
    if ($pass !== $pass2) {
        echo "Las contraseñas no coinciden";
        exit();
    }

    //TODO comprobacion de fecha
    date_default_timezone_set("Europe/Madrid");
    $fecha_hoy = new DateTime();

    $fecha_nacimiento_guardar = new DateTime($fecha_nacimiento);
    if($fecha_nacimiento>$fecha_hoy){
        echo 'La fecha de nacimiento no puede ser posterior a la de sitema';
        exit();
    }

    

    //TODO comprobacion que no existe el alias del usuario
    $existeuser = $conn->prepare('SELECT * FROM usuarios WHERE login=?');
    $existeuser->bind_param('s', $user);
    $existeuser->execute();
    $resultado = $existeuser->get_result();
    
    if($resultado->num_rows > 0){
        echo 'El nombre de usuario ya está registrado';
        $existeuser->close();
        exit();
    }
    
    //TODO inserción en la base de datos con la fecha corregida
    $inserta = $conn->prepare("INSERT INTO usuarios (nombre, apellidos, fecha_nacimiento, login, pass) VALUES (?, ?, ?, ?, ?)");

    //TODO encriptar contraseña e introducirla
    $hash=password_hash($pass2,PASSWORD_DEFAULT);

    $inserta->bind_param("sssss", $nombre, $apellidos, $fecha_nacimiento, $user, $hash);
    
    if ($inserta->execute()) {
        $_SESSION['usuario'] = $user;
        header('Location: ../');
        exit();
    } else {
        echo "Error: " . $inserta->error;
    }

    $inserta->close();
    $existeuser->close();
}
$conn->close();
?>