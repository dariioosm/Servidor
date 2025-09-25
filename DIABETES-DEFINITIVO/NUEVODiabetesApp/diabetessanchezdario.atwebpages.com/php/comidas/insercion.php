<?php
require __DIR__ .'/../conexion.php';
require_once __DIR__ . '/../controlglucosa/select.php';
//session_start();
//TODO recoger los datos del formulario

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $fecha_control = $_POST['fecha_control'];
    $tipo_comida = $_POST['tipo_comida'];
    $raciones = $_POST['raciones'];
    $glucosa_pre = $_POST['glucosa_preingesta'];
    $insulina = $_POST['insulina'];
    $glucosa_pos = $_POST['glucosa_postingesta'];
    
    //?Posibles datos de las tablas hiper e hipoglucemia (puede estar vacía la tabla)
    $glucosa_estado = $_POST['glucosa_estado'] ?? ''; //* tiene comillas, porque coge la info del value del radio

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

    $id_usuario = $_SESSION['id_usuario'];
    
    comprobarControl($id_usuario,$fecha_control);

    //TODO inserción en tabla comida

    $insert_comida = $conn->prepare('INSERT INTO comida (id_usuario, fecha_control, tipo_comida, raciones, glucosa_preingesta, insulina, glucosa_postingesta) VALUES (?, ?, ?, ?, ?, ?, ?)');
    $insert_comida->bind_param('issiiii', $id_usuario, $fecha_control, $tipo_comida, $raciones, $glucosa_pre, $insulina, $glucosa_pos);

    if ($insert_comida->execute()) {
        $_SESSION['mensaje']='Datos insertados correctamente en la tabla comida.';
    } else {
        $_SESSION['error']='Error al insertar datos en comida';
    }
    $insert_comida->close();

    //TODO insertar en tabla hiperglucemia

    if ($glucosa_estado == 'hiperglucemia' && !empty($glucosa_hiper) && !empty($hora_hiper) && !empty($unidades_correccion)) {
        $insert_hiper = $conn->prepare('INSERT INTO hiperglucemia (id_usuario, fecha_control, tipo_comida, glucosa_hiper, hora_hiper, unidades_correccion) VALUES (?, ?, ?, ?, ?, ?)');
        $insert_hiper->bind_param('issisi', $id_usuario, $fecha_control, $tipo_comida, $glucosa_hiper, $hora_hiper, $unidades_correccion);
        
        if ($insert_hiper->execute()) {
            $_SESSION['mensaje']='Datos insertados correctamente en la tabla hiperglucemia.';
        } else {
            $_SESSION['error']='Error al insertar datos en hiperglucemia';
        }
        $insert_hiper->close();
    }

    //TODO insertar en tabla hipoglucemia

    if ($glucosa_estado == 'hipoglucemia' && !empty($glucosa_hipo) && !empty($hora_hipo)) {
        $insert_hipo = $conn->prepare('INSERT INTO hipoglucemia (id_usuario, fecha_control, tipo_comida, glucosa_hipo, hora_hipo) VALUES (?, ?, ?, ?, ?)');
        $insert_hipo->bind_param('issis', $id_usuario, $fecha_control, $tipo_comida, $glucosa_hipo, $hora_hipo);

        if ($insert_hipo->execute()) {
            $_SESSION['mensaje']='Datos insertados correctamente en la tabla HIPOGLUCEMIA.';
        } else {
            $_SESSION['error']='Error al insertar datos en HIPOGLUCEMIA';
        }
        $insert_hipo->close();
       
    }
    header('Location:../../pages/panel.php');
    exit();
    $conn->close();
}
?>