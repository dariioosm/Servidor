<?php
require 'conexion.php';

//TODO recoger los datos del formulario

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $fecha_control = $_POST['fecha_control'];
    $tipo_comida = $_POST['tipo_comida'];
   
    
   

    //TODO comprobación de campos obligatorios

    if (empty($fecha_control) || empty($tipo_comida)) {
        echo 'Error: Campos obligatorios sin rellenar';
        exit;
    }

    //TODO comprobación de fecha

    date_default_timezone_set("Europe/Madrid");
    $fecha_hoy = new DateTime();
    $fecha_control_obj = DateTime::createFromFormat("Y-m-d", $fecha_control);

    if (!$fecha_control_obj || $fecha_control_obj > $fecha_hoy) {
        echo "Error: La fecha de control no puede ser posterior a la actual.";
        exit();
    }

    //TODO obtención del id_usuario

    $select_id = $conn->prepare('SELECT id_usuario FROM usuarios WHERE login = ?');
    $select_id->bind_param('s', $_SESSION['usuario']);
    $select_id->execute();
    $select_id->bind_result($id_usuario); //* el resultado de la busqueda se guarda en la variable id_usuario
    $select_id->fetch();
    $select_id->close();

    if (!$id_usuario) {
        echo 'Error: Usuario no encontrado';
        exit;
    }

    //TODO inserción en tabla comida

   $delete_comida = $conn-> prepare('DELETE FROM comida WHERE id_usuario=? AND fecha_control = ? AND tipo_comida = ? ');
   $delete_comida -> bind_param('iss',$id_usuario,$fecha_control,$tipo_comida);
   $delete_comida ->execute();
   $delete_comida -> close();

    $conn->close();
}
?>