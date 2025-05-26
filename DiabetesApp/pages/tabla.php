<?php
require __DIR__ . '/../php/conexion.php';
session_start();

$id_usuario = $_SESSION['id_usuario'];

// Filtros por rango de fechas
$fecha_inicio = isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : null;
$fecha_fin = isset($_POST['fecha_fin']) ? $_POST['fecha_fin'] : null;

// Obtener datos de todas las tablas
$datos = [
    'hiperglucemia' => [],
    'hipoglucemia' => [],
    'control_glucosa' => [],
    'comida' => []
];

if ($fecha_inicio && $fecha_fin) {
    // Consulta para hiperglucemia
    $stmt_hiper = $conn->prepare("SELECT * FROM hiperglucemia WHERE id_usuario = ? AND fecha_control BETWEEN ? AND ?");
    $stmt_hiper->bind_param('iss', $id_usuario, $fecha_inicio, $fecha_fin);
    $stmt_hiper->execute();
    $result_hiper = $stmt_hiper->get_result();
    while ($row = $result_hiper->fetch_assoc()) {
        $datos['hiperglucemia'][] = $row;
    }
    $stmt_hiper->close();

    // Consulta para hipoglucemia
    $stmt_hipo = $conn->prepare("SELECT * FROM hipoglucemia WHERE id_usuario = ? AND fecha_control BETWEEN ? AND ?");
    $stmt_hipo->bind_param('iss', $id_usuario, $fecha_inicio, $fecha_fin);
    $stmt_hipo->execute();
    $result_hipo = $stmt_hipo->get_result();
    while ($row = $result_hipo->fetch_assoc()) {
        $datos['hipoglucemia'][] = $row;
    }
    $stmt_hipo->close();

    // Consulta para control de glucosa
    $stmt_control = $conn->prepare("SELECT * FROM control_glucosa WHERE id_usuario = ? AND fecha_control BETWEEN ? AND ?");
    $stmt_control->bind_param('iss', $id_usuario, $fecha_inicio, $fecha_fin);
    $stmt_control->execute();
    $result_control = $stmt_control->get_result();
    while ($row = $result_control->fetch_assoc()) {
        $datos['control_glucosa'][] = $row;
    }
    $stmt_control->close();

    // Consulta para comida
    $stmt_comida = $conn->prepare("SELECT * FROM comida WHERE id_usuario = ? AND fecha_control BETWEEN ? AND ?");
    $stmt_comida->bind_param('iss', $id_usuario, $fecha_inicio, $fecha_fin);
    $stmt_comida->execute();
    $result_comida = $stmt_comida->get_result();
    while ($row = $result_comida->fetch_assoc()) {
        $datos['comida'][] = $row;
    }
    $stmt_comida->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualización de Datos de Glucosa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="text-center mb-4">Filtrar Datos por Rango de Fechas</h1>

    <form method="POST" class="row g-3 mb-4">
        <div class="col-md-5">
            <label for="fecha_inicio" class="form-label">Fecha Inicio:</label>
            <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" required>
        </div>
        <div class="col-md-5">
            <label for="fecha_fin" class="form-label">Fecha Fin:</label>
            <input type="date" id="fecha_fin" name="fecha_fin" class="form-control" required>
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Buscar</button>
        </div>
    </form>

    <a href="./panel.php" class="btn btn-secondary mb-3">Volver al Panel</a>

    <?php if ($fecha_inicio && $fecha_fin): ?>
      

        <h2 class="mt-4">Datos de Control de Glucosa</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Fecha Control</th>
                        <th>Lenta</th>
                        <th>Actividad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos['control_glucosa'] as $row): ?>
                        <tr>
                            <td><?= $row['fecha_control']; ?></td>
                            <td><?= $row['glucosa_lenta']; ?></td>
                            <td><?= $row['indice_actividad']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <h2 class="mt-4">Datos de Comida</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Fecha</th>
                        <th>Tipo de Comida</th>
                        <th>Glucosa Pre</th>
                        <th>Glucosa Post</th>
                        <th>Raciones</th>
                        <th>Insulina</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos['comida'] as $row): ?>
                        <tr>
                            <td><?= $row['fecha_control']; ?></td>
                            <td><?= $row['tipo_comida']; ?></td>
                            <td><?= $row['glucosa_preingesta']; ?></td>
                            <td><?= $row['glucosa_postingesta']; ?></td>
                            <td><?= $row['raciones']; ?></td>
                            <td><?= $row['insulina']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
          <h2 class="mt-4">Datos de Hiperglucemia</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Fecha Control</th>
                        <th>Tipo de Comida</th>
                        <th>Glucosa Hiper</th>
                        <th>Hora de la Hiper</th>
                        <th>Unidades de Corrección</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos['hiperglucemia'] as $row): ?>
                        <tr>
                            <td><?= $row['fecha_control']; ?></td>
                            <td><?= $row['tipo_comida']; ?></td>
                            <td><?= $row['glucosa_hiper']; ?></td>
                            <td><?= $row['hora_hiper']; ?></td>
                            <td><?= $row['unidades_correccion']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <h2 class="mt-4">Datos de Hipoglucemia</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Fecha Control</th>
                        <th>Tipo de Comida</th>
                        <th>Glucosa Hipo</th>
                        <th>Hora de la Hipo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos['hipoglucemia'] as $row): ?>
                        <tr>
                            <td><?= $row['fecha_control']; ?></td>
                            <td><?= $row['tipo_comida']; ?></td>
                            <td><?= $row['glucosa_hipo']; ?></td>
                            <td><?= $row['hora_hipo']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
