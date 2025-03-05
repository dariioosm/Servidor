<?php
require 'conexion.php';

//TODO recoger datos de formulario

if($_SERVER['REQUEST_METHOD']=='POST'){

    $fecha_control = $_POST['fecha_control'];
    $tipo_comida = $_POST['tipo_comida'];
    $raciones = $_POST['raciones'];
    $glucosa_pre = $_POST['glucosa_preingesta'];
    $insulina = $_POST['insulina'];
    $glucosa_pos = $_POST['glucosa_postingesta'];

    $glucosa_estado = $_POST['glucosa_estado'] ?? '';

    $glucosa_hiper = $_POST['glucosa_hiper'] ?? null;
    $hora_hiper = $_POST['hora_hiper'] ?? null;
    $unidades_correccion = $_POST['unidades_correccion'] ?? null;

    $glucosa_hipo = $_POST['glucosa_hipo'] ?? null;
    $hora_hipo = $_POST['hora_hipo'] ?? null;

    //TODO comprobación de campos obligatorios

    if (empty($fecha_control) || empty($tipo_comida) || empty($raciones) || empty($glucosa_pre) || empty($insulina) || empty($glucosa_pos)) {
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

    $select_id = $conn->prepare('SELECT id_usuario FROM usuarios WHERE login LIKE ?');
    $select_id->bind_param('s', $_SESSION['usuario']);
    $select_id->execute();
    $select_id->bind_result($id_usuario); //* el resultado de la busqueda se guarda en la variable id_usuario
    $select_id->fetch();
    $select_id->close();

    if (!$id_usuario) {
        echo 'Error: Usuario no encontrado';
        exit;
    }

    //TODO update en la tabla comida

    $update_comida = $conn->prepare('UPDATE comida SET tipo_comida = ?, raciones = ?, glucosa_preingesta = ?, insulina = ?, glucosa_postingesta = ? WHERE id_usuario = ? AND fecha_control = ?');
    $update_comida->bind_param('issiiii', $id_usuario, $fecha_control, $tipo_comida, $raciones, $glucosa_pre, $insulina, $glucosa_pos);


    if($update_comida->execute()){
        echo 'Datos actualizados correctamente en tabla comida';
    }else{
        echo 'Error al actualizar datos en tabla comida'. $update_comida->error;
        exit();
    }
    $update_comida ->close();

    //TODO update en tabla hiperglucemia

    if($glucosa_estado =='hiperglucemia' && !empty($glucosa_hiper) && !empty($hora_hiper) && !empty($unidades_correccion)){
        $update_hiper = $conn->prepare('UPDATE hiperglucemia SET glucosa_hiper = ? , hora_hiper = ? , unidades_correccion = ?  WHERE id_usuario = ? AND fecha_control = ? AND tipo_comida = ?');
        $update_hiper->bind_param('isisss', $glucosa_hiper, $hora_hiper, $unidades_correccion, $id_usuario, $fecha_control,$tipo_comida);

        if($update_hiper->execute()){
            echo 'Datos actualizados correctamente en tabla hiperglucemia';
        }else{
            echo 'Error al actualizar datos en tabla hiperglucemia: ' . $update_hiper->error;
            exit();
        }
        $update_hiper->close();
    }

    //TODO update en tabla hipoglucemia

    if($glucosa_estado == 'hipoglucemia' && !empty($glucosa_hipo) && !empty($hora_hipo)){
        $update_hipo = $conn->prepare('UPDATE hipoglucemia SET glucosa_hipo = ?, hora_hipo = ? WHERE id_usuario = ? AND fecha_control = ? AND tipo_comida = ?');
        $update_hipo->bind_param('isiss', $glucosa_hipo, $hora_hipo, $id_usuario, $fecha_control,$tipo_comida);

        if($update_hipo->execute()){
            echo 'Datos actualizados correctamente en tabla hipoglucemia';
        }else{
            echo 'Error al actualizar datos en tabla hipoglucemia: ' . $update_hipo->error;
            exit();
        }
        $update_hipo->close();
    }
}

$conn->close();
?>