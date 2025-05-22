<?php
require __DIR__ . '/../conexion.php';
session_start();
$id_usuario = $_SESSION['id_usuario']; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha_control = $_POST["fecha_control"];
    $tipo_comida = $_POST["tipo_comida"];
    $glucosa_hiper = trim($_POST["glucosa_hiper"]);
    $hora_hiper = $_POST["hora_hiper"];
    $unidades_correccion = $_POST["unidades_correccion"];
    // Preparamos la consulta
    $stmt = $conn->prepare("UPDATE hiperglucemia SET glucosa_hiper = ?, hora_hiper = ?, unidades_correccion = ? WHERE id_usuario = ? AND fecha_control = ? AND tipo_comida = ?");    
    if ($stmt === false) {
        $_SESSION['mensaje'] = "Error al preparar la consulta: " . $conn->error;
        header('Location: ../../pages/panel.php');
        exit();
    }
    // Tipos: glucosa_hiper (int), hora_hiper (string), unidades (int), id_usuario (int), fecha (string), tipo_comida (string)
    $stmt->bind_param("isiiss", $glucosa_hiper, $hora_hiper, $unidades_correccion, $id_usuario, $fecha_control, $tipo_comida);
    if ($stmt->execute()) {
        $_SESSION['mensaje'] = "Datos actualizados correctamente.";
    } else {
        $_SESSION['mensaje'] = "Error al actualizar los datos: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
    header('Location: ../../pages/panel.php');
    exit();
}
?>
