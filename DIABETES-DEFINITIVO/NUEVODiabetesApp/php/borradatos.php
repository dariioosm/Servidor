<?php
require __DIR__ . '/../conexion.php';
session_start();
//? Solo se necesitan fecha_control y tipo comida del formulario, porque el id lo cogemos por la sesion 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fecha_control = $_POST['fecha_control'];
    $tipo_comida = $_POST['tipo_comida'];

    // Comprobación de campos obligatorios
    if (empty($fecha_control) || empty($tipo_comida)) {
        echo 'Error: Campos obligatorios sin rellenar';
        exit;
    }

    // Comprobación de fecha
    date_default_timezone_set("Europe/Madrid");
    $fecha_hoy = new DateTime();
    $fecha_control_obj = DateTime::createFromFormat("Y-m-d", $fecha_control);

    if (!$fecha_control_obj || $fecha_control_obj > $fecha_hoy) {
        echo "Error: La fecha de control no puede ser posterior a la actual.";
        exit();
    }

$id_usuario = $_SESSION['id_usuario'];
    
comprobarControl($id_usuario,$fecha_control);
   

    // Eliminar datos de la tabla COMIDA
    $delete_comida = $conn->prepare('DELETE FROM comida WHERE id_usuario = ? AND fecha_control = ? AND tipo_comida = ?');
    $delete_comida->bind_param('iss', $id_usuario, $fecha_control, $tipo_comida);

    if ($delete_comida->execute()) {
        echo 'Datos eliminados correctamente de la tabla COMIDA';
    } else {
        echo 'Error al eliminar datos de la tabla COMIDA: ' . $delete_comida->error;
        exit();
    }
    $delete_comida->close();

    //TODO Eliminar datos de la tabla HIPERGLUCEMIA
    $delete_hiper = $conn->prepare('DELETE FROM hiperglucemia WHERE id_usuario = ? AND fecha_control = ? AND tipo_comida = ?');
    $delete_hiper->bind_param('iss', $id_usuario, $fecha_control, $tipo_comida);

    if ($delete_hiper->execute()) {
        $_SESSION['mensaje']='Datos eliminados correctamente de la tabla HIPERGLUCEMIA';
    } else {
        $_SESSION['error']='Error al eliminar datos de la tabla HIPERGLUCEMIA';
        exit();
    }
    $delete_hiper->close();

    //TODO Eliminar datos de la tabla HIPOGLUCEMIA
    $delete_hipo = $conn->prepare('DELETE FROM hipoglucemia WHERE id_usuario = ? AND fecha_control = ? AND tipo_comida = ?');
    $delete_hipo->bind_param('iss', $id_usuario, $fecha_control, $tipo_comida);

    if ($delete_hipo->execute()) {
        $_SESSION['mensaje']='Datos eliminados correctamente';
    } else {
        $_SESSION['error']= 'Error al elimiar datos de la tabla hipoglucemia';
    }
    
    $delete_hipo->close();
    $conn->close();
    header('Location:../../../pages/panel.php');
}


?>