<?php
//TODO hacer select de registro en fecha 'x'
require_once __DIR__ . '/insert.php';
require_once __DIR__ . '/../conexion.php';
function comprobarControl($id_usuario,$fecha){
    
    global $conn;
    $datos=[];
    $select_fecha = $conn->prepare('select * from control_glucosa where id_usuario = ? and fecha_control = ?');
    $select_fecha->bind_param('is',$id_usuario,$fecha);

    $select_fecha->execute();
    $select_fecha->store_result();
    if($select_fecha->num_rows==0){
        $datos['fecha_control']=$fecha;
        $datos['glucosa_lenta']=0;
        insertarControl($datos);
    }
        $select_fecha->close();
}
?>