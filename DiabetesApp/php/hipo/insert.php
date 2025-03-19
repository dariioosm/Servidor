<?php
require __DIR__ . '/../conexion.php';
require __DIR__.'/../controlglucosa/select.php';
session_start();

$id_usuario = $_SESSION['id_usuario'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fecha_control = $_POST['fecha_control'];
    $tipo_comida = $_POST['tipo_comida'];
    $glucosa_hipo = isset($_POST['glucosa_hipo']);
    $hora_hipo = isset($_POST['hora_hipo']);

    

    if (empty($id_usuario) || empty($fecha_control) || empty($tipo_comida) || is_null($glucosa_hipo) || is_null($hora_hipo)) {
        $_SESSION['error'] = 'Error: Campos obligatorios no proporcionados.';
        header('Location: ../../pages/panel.php');
        exit();
    }

    comprobarControl($id_usuario, $fecha_control);

    $insert_hipo = $conn->prepare('INSERT INTO hipoglucemia (id_usuario, fecha_control, tipo_comida, glucosa_hipo, hora_hipo) VALUES (?, ?, ?, ?, ?)');
    $insert_hipo->bind_param('issis', $id_usuario, $fecha_control, $tipo_comida, $glucosa_hipo, $hora_hipo);

    if ($insert_hipo->execute()) {
        $_SESSION['mensaje'] = 'Datos insertados correctamente en la tabla HIPOGLUCEMIA.';
    } else {
        $_SESSION['error'] = 'Error al insertar datos en HIPOGLUCEMIA: ';
    }

    $insert_hipo->close();
    $conn->close();

    header('Location: ../../pages/panel.php');
    exit();
}
?>
