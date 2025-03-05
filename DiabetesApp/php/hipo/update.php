<?php
require '../conexion.php';

$id_usuario = $_SESSION['usuario_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha_control = $_POST["fecha_control"];
    $tipo_comida = $_POST["tipo_comida"];
    $glucosa_hipo = $_POST["glucosa_hipo"];
    $hora_hipo = $_POST["hora_hipo"];

     //TODO obtención del id_usuario

     $select_id = $conn->prepare('SELECT id_usuario FROM usuarios WHERE login = ?');
     $select_id->bind_param('s', $_SESSION['usuario']);
     $select_id->execute();
     $select_id->bind_result($id_usuario); //* el resultado de la busqueda se guarda en la variable id_usuario
     $select_id->fetch();
     $select_id->close();

    $stmt = $conn->prepare("UPDATE hipoglucemia  SET glucosa_hiper = ?, hora_hiper = ?, unidades_correccion = ? WHERE id_usuario = ? AND fecha_control = ? AND tipo_comida = ?");
    $stmt->bind_param("isiss", $glucosa_hiper, $hora_hiper, $id_usuario, $fecha_control, $tipo_comida);
    
    if ($stmt->execute()) {
        echo "<script>alert('Registro actualizado correctamente');";
        header('Location: ../../../../pages/panel.php');
    } else {
        echo "<script>alert('Error al actualizar el registro');</script>";
        header('Location: ../../../../pages/panel.php');
    }

    $stmt->close();
    $conn->close();
}
?>
