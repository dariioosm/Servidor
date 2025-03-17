<?php 
require __DIR__ . '/../conexion.php';
//TODO recoger los datos del formulario
session_start();

    function insertarControl($datos){
        global $conn,$_SESSION;
        $fecha_control= $datos['fecha_control'];
        $glucosa_lenta = $datos['glucosa_lenta'];
        //TODO comprobacion de eleccion del value del indice de actividad
        if(!isset($datos['indice_actividad'])){
            $indice_actividad = 0;
        }else{
            $indice_actividad = $datos['indice_actividad'];
        }
        
        //TODO obtención del id_usuario
    
        // $select_id = $conn->prepare('SELECT id_usuario FROM USUARIOS WHERE login = ?');
        // $select_id->bind_param('i', $_SESSION['usuario']);
        // $select_id->execute();
        // $select_id->bind_result($id_usuario); //* el resultado de la busqueda se guarda en la variable id_usuario
        // $select_id->fetch();
        // $select_id->close();

        $id_usuario=$_SESSION['id_usuario'];
    
        //TODO insercion en la tabla de control_glucosa
    try{
        $insert_control = $conn->prepare('INSERT INTO control_glucosa (id_usuario, fecha_control, glucosa_lenta, indice_actividad) VALUES (?, ?, ?, ?)');
        $insert_control ->bind_param('isii',$id_usuario,$fecha_control,$glucosa_lenta,$indice_actividad);
        $insert_control -> execute();
        $insert_control ->close();
    }catch(Exception $e){
        $_SESSION['error']= "Control ya registrado";
    }
        $conn->close();
        header('Location: ../../pages/panel.php');
        exit;
    }
    if(isset($_POST['loginForm'])){
        insertarControl($_POST);
    }
?>