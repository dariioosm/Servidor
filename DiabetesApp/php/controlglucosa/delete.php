<?php 
require __DIR__ . '/../conexion.php';
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){

    $fecha_control= $_POST['fecha_control'];

    $id_usuario = $_SESSION['id_usuario'];
    
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
    exit();
}
?>