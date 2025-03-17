<?php 
require __DIR__ . '/../conexion.php';
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){

    $fecha_control= $_POST['fecha_control'];

    $id_usuario = $_SESSION['id_usuario'];

    //TODO Obtener id_usuario desde el nombre de usuario
    // $select_id = $conn->prepare('SELECT id_usuario FROM USUARIOS WHERE id_usuario = ?');
    // $select_id->bind_param('s', $id_usuario);
    // $select_id->execute();
    // $select_id->bind_result($id_usuario);
    // $select_id->fetch();
    // $select_id->close();
    
    $delete_control = $conn ->prepare('DELETE FROM control_glucosa WHERE id_usuario = ? AND fecha_control = ? ');
    $delete_control ->bind_param('is',$id_usuario,$fecha_control);
    $delete_control -> execute();
    
    if ($delete_control->execute()) {
        $_SESSION['mensaje']="Datos eliminados correctamente.";
    } else {
        $_SESSION['mensaje']='Error al eliminar los datos.';
    }
    
    $delete_control ->close();
    $conn ->close();
    header('Location: ../../pages/panel.php');
    exit;
    
}

?>