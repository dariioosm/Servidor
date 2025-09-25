<?php 
require __DIR__ . '/../conexion.php';
//TODO recoger los datos del formulario
session_start();
    function insertarControl($datos){
    try{
        global $conn,$_SESSION;
        $fecha_control= $datos['fecha_control'];
        $glucosa_lenta = $datos['glucosa_lenta'];
        //TODO comprobacion de eleccion del value del indice de actividad
        if(!isset($datos['indice_actividad'])){
            $indice_actividad = 0;
        }else{
            $indice_actividad = $datos['indice_actividad'];
        }
       	$id_usuario=$_SESSION['id_usuario'];
        //TODO insercion en la tabla de control_glucosa
        $insert_control = $conn->prepare('INSERT INTO control_glucosa (id_usuario, fecha_control, glucosa_lenta, indice_actividad) VALUES (?, ?, ?, ?)');
        $insert_control ->bind_param('isii',$id_usuario,$fecha_control,$glucosa_lenta,$indice_actividad);
        $insert_control -> execute();
        $insert_control ->close();
        $conn->close();
       // var_dump($_SESSION);
    }catch(Exception $e){
        $_SESSION['error']= "Control ya registrado";
    }        
    if(isset($_SESSION['entrada'])){
        unset($_SESSION['entrada']);
            header('Location: ../../pages/panel.php');
            exit();
        }else{
            header('Location: ../../pages/panel.php');
            exit();
    }
}
    if(isset($_POST['insertForm'])){
        insertarControl($_POST);
    }
?>