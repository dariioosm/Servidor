<?php 
require '../conexion.php';

if($_SERVER['REQUEST_METHOD']=='POST'){

    $fecha_control= $_POST['fecha_control'];

    $login = $_SESSION['usuario'];

    //TODO Obtener id_usuario desde el nombre de usuario
    $select_id = $conn->prepare('SELECT id_usuario FROM USUARIOS WHERE login = ?');
    $select_id->bind_param('s', $login);
    $select_id->execute();
    $select_id->bind_result($id_usuario);
    $select_id->fetch();
    $select_id->close();

    $delete_control = $conn ->prepare('DELETE FROM control_glucosa WHERE id_usuario = ? AND fecha_control = ? ');
    $delete_control ->bind_param('is',$id_usuario,$fecha_control);
    $delete_control -> execute();
    $delete_control ->close();

    $conn ->close();
}

?>