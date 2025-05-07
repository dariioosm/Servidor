<?php
require __DIR__ . '/../conexion.php';
session_start();
$id_usuario = $_SESSION['id_usuario'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fecha_control = $_POST['fecha_control'];
    $tipo_comida = $_POST['tipo_comida'];
    $glucosa_hiper = $_POST['glucosa_hiper'] ?? null;
    $hora_hiper = $_POST['hora_hiper'] ?? null;
    $unidades_correccion = $_POST['unidades_correccion'] ?? null;
    $insert_hiper = $conn->prepare('INSERT INTO hiperglucemia (id_usuario, fecha_control, tipo_comida, glucosa_hiper, hora_hiper, unidades_correccion) VALUES (?, ?, ?, ?, ?, ?)');
    $insert_hiper->bind_param('issisi', $id_usuario, $fecha_control, $tipo_comida, $glucosa_hiper, $hora_hiper, $unidades_correccion);
    if ($insert_hiper->execute()) {
        $_SESSION['mensaje'] = 'Datos insertados correctamente en la tabla hiperglucemia.';
    } else {
        $_SESSION['error'] = 'Error al insertar datos en hiperglucemia';
    }
    $insert_hiper->close();
    $conn->close();
    header('Location: ../../pages/panel.php');
    exit();
}
?>
