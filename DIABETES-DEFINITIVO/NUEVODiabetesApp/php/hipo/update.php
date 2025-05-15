<?php
require __DIR__.'/../conexion.php';

session_start();
$id_usuario = $_SESSION['id_usuario'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha_control = $_POST["fecha_control"];
    $tipo_comida = $_POST["tipo_comida"];
    $glucosa_hipo = $_POST["glucosa_hipo"];
    $hora_hipo = $_POST["hora_hipo"];


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
