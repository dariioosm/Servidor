<?php
require '../conexion.php';
session_start();

$id_usuario = $_SESSION['usuario_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha_control = $_POST["fecha_control"];
    $tipo_comida = $_POST["tipo_comida"];

    $stmt_check = $conn->prepare("SELECT * FROM hiperglucemia WHERE id_usuario = ? AND fecha_control = ? AND tipo_comida = ?");
    $stmt_check->bind_param("iss", $id_usuario, $fecha_control, $tipo_comida);
    $stmt_check->execute();
    $result = $stmt_check->get_result();
    
    $stmt_check->close();

    $stmt_delete = $conn->prepare("DELETE FROM hiperglucemia WHERE id_usuario = ? AND fecha_control = ? AND tipo_comida = ?");
    $stmt_delete->bind_param("iss", $id_usuario, $fecha_control, $tipo_comida);

    if ($stmt_delete->execute()) {
        echo "<script>alert('Registro eliminado correctamente.');</script>";
        header('Location:../../../../pages/panel.php');
    } else {
        echo "<script>alert('Error al eliminar el registro.');</script>";
        header('Location:../../../../pages/panel.php');
    }

    $stmt_delete->close();
    $conn->close();
}
?>
