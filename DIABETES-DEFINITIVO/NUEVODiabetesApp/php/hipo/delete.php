<?php
require '../conexion.php';
session_start();
$id_usuario = $_SESSION['id_usuario'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha_control = $_POST["fecha_control"];
    $tipo_comida = $_POST["tipo_comida"];

    $stmt_check = $conn->prepare("SELECT * FROM hipoglucemia WHERE id_usuario = ? AND fecha_control = ? AND tipo_comida = ?");
    $stmt_check->bind_param("iss", $id_usuario, $fecha_control, $tipo_comida);
    $stmt_check->execute();
    $result = $stmt_check->get_result();
    
    $stmt_check->close();

    $stmt_delete = $conn->prepare("DELETE FROM hipoglucemia WHERE id_usuario = ? AND fecha_control = ? AND tipo_comida = ?");
    $stmt_delete->bind_param("iss", $id_usuario, $fecha_control, $tipo_comida);

    if ($stmt_delete->execute()) {
        $_SESSION['mensaje']='Datos eliminados correctamente en la tabla HIPOGLUCEMIA.';
    } else {
        $_SESSION['error']='Error al eliminar datos en HIPOGLUCEMIA';
    }

    $stmt_delete->close();
    $conn->close();
    header('Location:../../pages/panel.php');
    exit;
}
?>
