<?php
require '../conexion.php';
$fecha_control = $_POST['fecha_control'];
$login = $_SESSION['usuario'];

// Buscar el id_usuario en la base de datos
$select_id = $conn->prepare('SELECT id_usuario FROM USUARIOS WHERE login = ?');
$select_id->bind_param('s', $login);
$select_id->execute();
$select_id->bind_result($id_usuario);
$select_id->fetch();
$select_id->close();

if (!$id_usuario) {
    die("Error: Usuario no encontrado.");
}



if (!$fecha_control) {
    die("Error: No se proporcionó una fecha.");
}

// Buscar los datos actuales en CONTROL_GLUCOSA
$query = $conn->prepare('SELECT glucosa_lenta, indice_actividad FROM CONTROL_GLUCOSA WHERE id_usuario = ? AND fecha_control = ?');
$query->bind_param('is', $id_usuario, $fecha_control);
$query->execute();
$query->bind_result($glucosa_lenta, $indice_actividad);
$query->fetch();
$query->close();

if (!$glucosa_lenta) {
    die("Error: No hay datos para esta fecha.");
}

// Si el formulario se envió, actualizar los datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nueva_glucosa_lenta = $_POST['glucosa_lenta'];
    $nuevo_indice_actividad = $_POST['indice_actividad'];

    $update = $conn->prepare('UPDATE CONTROL_GLUCOSA SET glucosa_lenta = ?, indice_actividad = ? WHERE id_usuario = ? AND fecha_control = ?');
    $update->bind_param('iiis', $nueva_glucosa_lenta, $nuevo_indice_actividad, $id_usuario, $fecha_control);

    if ($update->execute()) {
        echo "<p style='color:green;'>Datos actualizados correctamente.</p>";
    } else {
        echo "<p style='color:red;'>Error al actualizar los datos.</p>";
    }

    $update->close();
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
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="control_glucosa.php" class="btn btn-secondary">Volver</a>
        </form>
    </div>
</body>

</html>