<?php
require __DIR__ . '/../php/conexion.php';
session_start();

$fecha_inicio = isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : null;
$fecha_fin = isset($_POST['fecha_fin']) ? $_POST['fecha_fin'] : null;

// Obtener datos de Hiperglucemia con rango de fechas
$stmt_hiper = $conn->prepare("SELECT fecha_control, AVG(glucosa_hiper) as promedio 
                              FROM hiperglucemia 
                              WHERE fecha_control BETWEEN ? AND ? 
                              GROUP BY fecha_control");
$stmt_hiper->bind_param('ss', $fecha_inicio, $fecha_fin);
$stmt_hiper->execute();
$result_hiper = $stmt_hiper->get_result();

$fechas_hiper = [];
$valores_hiper = [];
while ($row = $result_hiper->fetch_assoc()) {
    $fechas_hiper[] = $row['fecha_control'];
    $valores_hiper[] = $row['promedio'];
}
$stmt_hiper->close();

// Obtener datos de Hipoglucemia con rango de fechas
$stmt_hipo = $conn->prepare("SELECT fecha_control, AVG(glucosa_hipo) as promedio 
                             FROM hipoglucemia 
                             WHERE fecha_control BETWEEN ? AND ? 
                             GROUP BY fecha_control");
$stmt_hipo->bind_param('ss', $fecha_inicio, $fecha_fin);
$stmt_hipo->execute();
$result_hipo = $stmt_hipo->get_result();

$fechas_hipo = [];
$valores_hipo = [];
while ($row = $result_hipo->fetch_assoc()) {
    $fechas_hipo[] = $row['fecha_control'];
    $valores_hipo[] = $row['promedio'];
}
$stmt_hipo->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas de Glucosa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="text-primary">Filtrar Estadísticas</h1>
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
                    <button id="stats" type="submit" class="btn btn-primary w-100">Buscar</button>
                </div>
            </form>
        </div>

        <?php if (isset($_POST['fecha_inicio']) && isset($_POST['fecha_fin']) && $_POST['fecha_inicio'] != null && $_POST['fecha_fin'] != null) { ?>
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
        <?php } ?>
    </div>

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

        console.log(<?php echo json_encode($fechas_hipo); ?>);
        console.log(<?php echo json_encode($valores_hipo); ?>);
        console.log(<?php echo json_encode($fechas_hiper); ?>);
        console.log(<?php echo json_encode($valores_hiper); ?>);

        if (<?php echo json_encode($fechas_hiper); ?>.length > 0) {
            configChart(
                document.getElementById('hiperChart').getContext('2d'),
                'Promedio Glucosa Hiperglucemia',
                <?php echo json_encode($fechas_hiper); ?>,
                <?php echo json_encode($valores_hiper); ?>,
                'rgba(255, 99, 132, 1)'
            );
        }

        if (<?php echo json_encode($fechas_hipo); ?>.length > 0) {
            configChart(
                document.getElementById('hipoChart').getContext('2d'),
                'Promedio Glucosa Hipoglucemia',
                <?php echo json_encode($fechas_hipo); ?>,
                <?php echo json_encode($valores_hipo); ?>,
                'rgba(54, 162, 235, 1)'
            );
        }
    </script>

</body>
</html>
