<?php
require __DIR__ . '/../conexion.php';
session_start();
if(isset($_POST['fecha_control'])){
    $fecha_control = $_POST['fecha_control'];
}
$id_usuario = $_SESSION['id_usuario'];
if (!$id_usuario) {
    die("Error: Usuario no encontrado.");
}



if (isset($fecha_control) && !$fecha_control) {
    die("Error: No se proporcionó una fecha.");
}

// TODO Buscar los datos actuales en CONTROL_GLUCOSA
$query = $conn->prepare('SELECT fecha_control,glucosa_lenta, indice_actividad FROM control_glucosa WHERE id_usuario = ? AND fecha_control = ?');
$query->bind_param('is', $id_usuario, $fecha_control);
$query->execute();
$query->bind_result($fecha_control,$glucosa_lenta, $indice_actividad);
$query->fetch();
$query->close();

if (isset($fecha_control)&& !$fecha_control ) {
    die("Error: No hay datos para esta fecha.");
}

// TODO Si el formulario se envió, actualizar los datos
if (isset($_POST['updateControl'])) {
    $nueva_glucosa_lenta = $_POST['glucosa_lenta'];
    $nuevo_indice_actividad = $_POST['indice_actividad'];

    $update = $conn->prepare('UPDATE control_glucosa SET glucosa_lenta = ?, indice_actividad = ? WHERE id_usuario = ? AND fecha_control = ?');
    $update->bind_param('iiis', $nueva_glucosa_lenta, $nuevo_indice_actividad, $id_usuario, $fecha_control);

    if ($update->execute()) {
        $_SESSION['mensaje']="Datos actualizados correctamente.";
    } else {
        $_SESSION['mensaje']='Error al actualizar los datos.';
    }

    $update->close();
    header('Location: ../../pages/panel.php');
    exit;
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Control de Glucosa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Editar Control de Glucosa - <?php echo htmlspecialchars($fecha_control); ?></h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Unidades de glucosa lenta:</label>
                <input type="number" name="glucosa_lenta" class="form-control" value="<?php echo $glucosa_lenta; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Índice de actividad:</label>
                <select class="form-select" name="indice_actividad" required>
                    <option value="1" <?php if ($indice_actividad == 1) echo "selected"; ?>>Sedentario</option>
                    <option value="2" <?php if ($indice_actividad == 2) echo "selected"; ?>>Ligero</option>
                    <option value="3" <?php if ($indice_actividad == 3) echo "selected"; ?>>Moderado</option>
                    <option value="4" <?php if ($indice_actividad == 4) echo "selected"; ?>>Activo</option>
                    <option value="5" <?php if ($indice_actividad == 5) echo "selected"; ?>>Muy activo</option>
                </select>
            </div>
            <input type="hidden" name="fecha_control" value="<?=isset($fecha_control)?$fecha_control:""?>">
            <button name="updateControl" type="submit" class="btn btn-primary">Actualizar</button>
            <a href="../../pages/panel.php" class="btn btn-secondary">Volver</a>
        </form>
    </div>
</body>

</html>