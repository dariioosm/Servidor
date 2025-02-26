<?php
require 'conexion.php';
// Filtros por mes y año
$mes = isset($_GET['mes']) ? $_GET['mes'] : date('m');
$anio = isset($_GET['anio']) ? $_GET['anio'] : date('Y');

// Datos Hiperglucemia
$query_hiper = "SELECT fecha_control, AVG(glucosa_hiper) as promedio FROM hiperglucemia WHERE MONTH(fecha_control) = :mes AND YEAR(fecha_control) = :anio GROUP BY fecha_control";
$stmt_hiper = $pdo->prepare($query_hiper);
$stmt_hiper->bindParam(':mes', $mes, PDO::PARAM_INT);
$stmt_hiper->bindParam(':anio', $anio, PDO::PARAM_INT);
$stmt_hiper->execute();
$result_hiper = $stmt_hiper->fetchAll(PDO::FETCH_ASSOC);
$fechas_hiper = [];
$valores_hiper = [];
foreach ($result_hiper as $row) {
    // Aseguramos que la fecha esté en formato adecuado para Chart.js
    $fechas_hiper[] = date('Y-m-d', strtotime($row['fecha_control']));
    $valores_hiper[] = $row['promedio'];
}

// Datos Hipoglucemia
$query_hipo = "SELECT fecha_control, AVG(glucosa_hipo) as promedio FROM Hipoglucemia WHERE MONTH(fecha_control) = :mes AND YEAR(fecha_control) = :anio GROUP BY fecha_control";
$stmt_hipo = $pdo->prepare($query_hipo);
$stmt_hipo->bindParam(':mes', $mes, PDO::PARAM_INT);
$stmt_hipo->bindParam(':anio', $anio, PDO::PARAM_INT);
$stmt_hipo->execute();
$result_hipo = $stmt_hipo->fetchAll(PDO::FETCH_ASSOC);
$fechas_hipo = [];
$valores_hipo = [];
foreach ($result_hipo as $row) {
    // Aseguramos que la fecha esté en formato adecuado para Chart.js
    $fechas_hipo[] = date('Y-m-d', strtotime($row['fecha_control']));
    $valores_hipo[] = $row['promedio'];
}

$pdo = null; // Cerrar la conexión a la base de datos
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas de Glucosa</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h2>Estadísticas de Hiperglucemia</h2>
    <canvas id="hiperChart"></canvas>
    
    <h2>Estadísticas de Hipoglucemia</h2>
    <canvas id="hipoChart"></canvas>
    
    <script>
        // Gráfico Hiperglucemia
        const ctxHiper = document.getElementById('hiperChart').getContext('2d');
        new Chart(ctxHiper, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($fechas_hiper); ?>,
                datasets: [{
                    label: 'Promedio Glucosa Hiperglucemia',
                    data: <?php echo json_encode($valores_hiper); ?>,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    fill: false
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: 'day'
                        },
                        title: {
                            display: true,
                            text: 'Fecha'
                        }
                    }
                }
            }
        });

        // Gráfico Hipoglucemia
        const ctxHipo = document.getElementById('hipoChart').getContext('2d');
        new Chart(ctxHipo, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($fechas_hipo); ?>,
                datasets: [{
                    label: 'Promedio Glucosa Hipoglucemia',
                    data: <?php echo json_encode($valores_hipo); ?>,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    fill: false
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: 'day'
                        },
                        title: {
                            display: true,
                            text: 'Fecha'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
