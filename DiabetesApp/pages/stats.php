<?php
require __DIR__ . '/../php/conexion.php';
session_start();
$id_usuario = $_SESSION['id_usuario'];

$fecha_inicio = isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : null;
$fecha_fin = isset($_POST['fecha_fin']) ? $_POST['fecha_fin'] : null;

// Hiperglucemia
$stmt_hiper = $conn->prepare("SELECT fecha_control, AVG(glucosa_hiper) as promedio 
                              FROM hiperglucemia 
                              WHERE id_usuario = ? AND fecha_control BETWEEN ? AND ? 
                              GROUP BY fecha_control");
$stmt_hiper->bind_param('iss', $id_usuario, $fecha_inicio, $fecha_fin);
$stmt_hiper->execute();
$result_hiper = $stmt_hiper->get_result();

$fechas_hiper = [];
$valores_hiper = [];
while ($row = $result_hiper->fetch_assoc()) {
    $fechas_hiper[] = $row['fecha_control'];
    $valores_hiper[] = $row['promedio'];
}
$stmt_hiper->close();

// Hipoglucemia
$stmt_hipo = $conn->prepare("SELECT fecha_control, AVG(glucosa_hipo) as promedio 
                             FROM hipoglucemia 
                             WHERE id_usuario = ? AND fecha_control BETWEEN ? AND ? 
                             GROUP BY fecha_control");
$stmt_hipo->bind_param('iss', $id_usuario, $fecha_inicio, $fecha_fin);
$stmt_hipo->execute();
$result_hipo = $stmt_hipo->get_result();

$fechas_hipo = [];
$valores_hipo = [];
while ($row = $result_hipo->fetch_assoc()) {
    $fechas_hipo[] = $row['fecha_control'];
    $valores_hipo[] = $row['promedio'];
}
$stmt_hipo->close();

// Comidas por tipo
$stmt_cont = $conn->prepare('SELECT tipo_comida, COUNT(*) as total FROM comida WHERE id_usuario = ? GROUP BY tipo_comida');
$stmt_cont->bind_param('i', $id_usuario);
$stmt_cont->execute();
$result_cont = $stmt_cont->get_result();

$comidas = [];
while ($fila = $result_cont->fetch_assoc()) {
    $comidas[$fila['tipo_comida']] = $fila['total'];
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estadísticas de Glucosa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="text-primary">Tus Estadísticas</h1>
        <a href="panel.php" class="btn btn-secondary">Volver al Panel</a>
    </div>

    <div class="card shadow-sm p-4">
        <form method="POST" class="row g-3">
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
    </div>

    <?php if ($fecha_inicio && $fecha_fin) { ?>
        <!-- Gráficos -->
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="card shadow-sm p-3">
                    <h5 class="text-center text-danger">Estadísticas de Hiperglucemia</h5>
                    <canvas id="hiperChart" class="border rounded"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm p-3">
                    <h5 class="text-center text-info">Estadísticas de Hipoglucemia</h5>
                    <canvas id="hipoChart" class="border rounded"></canvas>
                </div>
            </div>
        </div>

        <!-- Comidas registradas -->
        <?php if (!empty($comidas)) {
            $total_comidas = array_sum($comidas);
        ?>
        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
                <div class="card shadow-sm p-4">
                    <h5 class="text-center text-success mb-3">Registro de Comidas</h5>
                    <p class="text-center">
                        Has registrado <strong><?php echo $total_comidas; ?></strong> comidas, distribuidas en los siguientes tipos:
                    </p>
                    <ul class="list-group">
                        <?php foreach ($comidas as $tipo => $cantidad) { ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="fw-semibold"><?php echo ucfirst($tipo); ?></span>
                                <span class="badge bg-primary rounded-pill"><?php echo $cantidad; ?></span>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php } ?>
    <?php } ?>
</div>

<!-- Chart.js Script -->
<script>
    const configChart = (ctx, label, fechas, valores, color) => {
        return new Chart(ctx, {
            type: 'bar',
            data: {
                labels: fechas,
                datasets: [{
                    label: label,
                    data: valores,
                    backgroundColor: color,
                    borderColor: color,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: 'day',
                            tooltipFormat: 'yyyy-MM-dd',
                            displayFormats: { day: 'yyyy-MM-dd' }
                        },
                        title: { display: true, text: 'Fecha' }
                    },
                    y: {
                        title: { display: true, text: 'Nivel de Glucosa' },
                        beginAtZero: false
                    }
                }
            }
        });
    };

    const fechasHipo = <?php echo json_encode($fechas_hipo); ?>;
    const valoresHipo = <?php echo json_encode($valores_hipo); ?>;
    const fechasHiper = <?php echo json_encode($fechas_hiper); ?>;
    const valoresHiper = <?php echo json_encode($valores_hiper); ?>;

    if (fechasHiper.length > 0) {
        configChart(
            document.getElementById('hiperChart').getContext('2d'),
            'Promedio Glucosa Hiperglucemia',
            fechasHiper,
            valoresHiper,
            'rgba(255, 99, 132, 1)'
        );
    }

    if (fechasHipo.length > 0) {
        configChart(
            document.getElementById('hipoChart').getContext('2d'),
            'Promedio Glucosa Hipoglucemia',
            fechasHipo,
            valoresHipo,
            'rgba(54, 162, 235, 1)'
        );
    }
</script>

</body>
</html>
