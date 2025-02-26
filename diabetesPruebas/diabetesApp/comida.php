<?php 
require 'conexion.php';
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit;
}
if($_SERVER['REQUESTED_METHOD']=='post'){
    $fecha_control = $_POST['fecha_control'];
    $tipo_comida=$_POST['tipo_comida'];
    $raciones=$_POST['raciones'];
    $glucosa_preingesta=$_POST['glucosa_preingesta'];
    $insulina=$_POST['insulina'];
    $glucosa_postingesta=$_POST['glucosa_postingesta'];
    $checksql='SELECT * FROM CONTROL_GLUCOSA WHERE id_usuario = ? AND fecha_control=? ';
    $checkstmt=$conn->prepare($checksql);
    $checkstmt->execute([$_SESSION['user_id'],$fecha_control]);
}

?>