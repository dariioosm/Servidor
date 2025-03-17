<?php
require '../conexion.php';


$id_usuario = $_SESSION['usuario_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha_control = $_POST["fecha_control"];
    $tipo_comida = $_POST["tipo_comida"];

     //TODO obtención del id_usuario

     $select_id = $conn->prepare('SELECT id_usuario FROM usuarios WHERE login = ?');
     $select_id->bind_param('s', $_SESSION['usuario']);
     $select_id->execute();
     $select_id->bind_result($id_usuario); //* el resultado de la busqueda se guarda en la variable id_usuario
     $select_id->fetch();
     $select_id->close();

    $stmt_check = $conn->prepare("SELECT * FROM hiperglucemia WHERE id_usuario = ? AND fecha_control = ? AND tipo_comida = ?");
    $stmt_check->bind_param("iss", $id_usuario, $fecha_control, $tipo_comida);
    $stmt_check->execute();
    $result = $stmt_check->get_result();
    
    $stmt_check->close();

    $stmt_delete = $conn->prepare("DELETE FROM hiperglucemia WHERE id_usuario = ? AND fecha_control = ? AND tipo_comida = ?");
    $stmt_delete->bind_param("iss", $id_usuario, $fecha_control, $tipo_comida);

    if ($stmt_delete->execute()) {
        $_SESSION['mensaje']='Datos eliminados correctamente en la tabla hiperglucemia.';
    } else {
        $_SESSION['error']='Error al eliminar datos en hiperglucemia';
    }

    $stmt_delete->close();
    $conn->close();
    header('Location:../../pages/panel.php');
    exit;
}
?>
