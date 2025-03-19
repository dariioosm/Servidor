<?php
require __DIR__.'/../conexion.php';

session_start();
$id_usuario = $_SESSION['id_usuario'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha_control = $_POST["fecha_control"];
    $tipo_comida = $_POST["tipo_comida"];
    $glucosa_hipo = $_POST["glucosa_hipo"];
    $hora_hipo = $_POST["hora_hipo"];

     //TODO obtención del id_usuario
/*
     $select_id = $conn->prepare('SELECT id_usuario FROM usuarios WHERE login = ?');
     $select_id->bind_param('s', $_SESSION['usuario']);
     $select_id->execute();
     $select_id->bind_result($id_usuario); //* el resultado de la busqueda se guarda en la variable id_usuario
     $select_id->fetch();
     $select_id->close();*/

     $stmt = $conn->prepare("UPDATE hipoglucemia SET glucosa_hipo = ?, hora_hipo = ? WHERE id_usuario = ? AND fecha_control = ? AND tipo_comida = ?");
     $stmt->bind_param("isiss", $glucosa_hipo, $hora_hipo, $id_usuario, $fecha_control, $tipo_comida);
    
     if ($stmt->execute()) {
        $_SESSION['mensaje'] = "Registro actualizado correctamente";
    } else {
        $_SESSION['error'] = "Error al actualizar el registro";
    }

    $stmt->close();
    $conn->close();

    header('Location: ../../pages/panel.php');
    exit();
}
?>
