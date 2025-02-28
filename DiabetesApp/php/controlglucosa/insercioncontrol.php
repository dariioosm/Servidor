<?php 

require '../conexion.php';
//TODO recoger los datos del formulario


if($_SERVER['REQUEST_METHOD']=='POST'){
    $fecha_control= $_POST['fecha_control'];
    $glucosa_lenta = $_POST['glucosa_lenta'];
    //TODO comprobacion de eleccion del value del indice de actividad
    if(isset($_POST['indice_actividad'])){
    $indice_actividad = $_POST['indice_actividad'];
    }
    
    //TODO obtención del id_usuario

    $select_id = $conn->prepare('SELECT id_usuario FROM USUARIOS WHERE login = ?');
    $select_id->bind_param('i', $_SESSION['usuario']);
    $select_id->execute();
    $select_id->bind_result($id_usuario); //* el resultado de la busqueda se guarda en la variable id_usuario
    $select_id->fetch();
    $select_id->close();




    //TODO insercion en la tabla de control_glucosa

    $insert_control = $conn->prepare('INSERT INTO control_glucosa (id_usuario, fecha_control, glucosa_lenta, indice_actividad) VALUES (?, ?, ?, ?)');
    $insert_control ->bind_param('isii',$id_usuario,$fecha_control,$glucosa_lenta,$indice_actividad);
    $insert_control -> execute();
    $insert_control ->close();
    header('Location: ../../../../pages/insertacomidas.php');
}


?>