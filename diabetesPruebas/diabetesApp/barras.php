<?php
require 'conexion.php';

// Filtros por mes y año
$mes = isset($_GET['mes']) ? $_GET['mes'] : date('m');
$anio = isset($_GET['anio']) ? $_GET['anio'] : date('Y');

// Datos Hiperglucemia
$query_hiper = "SELECT fecha_control, AVG(glucosa_hiper) as promedio FROM Hiperglucemia WHERE MONTH(fecha_control) = :mes AND YEAR(fecha_control) = :anio GROUP BY fecha_control";
$stmt_hiper = $pdo->prepare($query_hiper);
$stmt_hiper->bindValue(':mes', $mes, PDO::PARAM_INT);  // Vinculamos el parámetro mes como entero
$stmt_hiper->bindValue(':anio', $anio, PDO::PARAM_INT);  // Vinculamos el parámetro año como entero
$stmt_hiper->execute();
$result_hiper = $stmt_hiper->fetchAll(PDO::FETCH_ASSOC);
$fechas_hiper = [];
$valores_hiper = [];
foreach ($result_hiper as $row) {
    // Convertir la fecha a un formato legible por el usuario
    $fechas_hiper[] = date("d/m/Y", strtotime($row['fecha_control'])); // Formato legible
    $valores_hiper[] = $row['promedio'];
}

// Datos Hipoglucemia
$query_hipo = "SELECT fecha_control, AVG(glucosa_hipo) as promedio FROM Hipoglucemia WHERE MONTH(fecha_control) = :mes AND YEAR(fecha_control) = :anio GROUP BY fecha_control";
$stmt_hipo = $pdo->prepare($query_hipo);
$stmt_hipo->bindValue(':mes', $mes, PDO::PARAM_INT);  // Vinculamos el parámetro mes como entero
$stmt_hipo->bindValue(':anio', $anio, PDO::PARAM_INT);  // Vinculamos el parámetro año como entero
$stmt_hipo->execute();
$result_hipo = $stmt_hipo->fetchAll(PDO::FETCH_ASSOC);
$fechas_hipo = [];
$valores_hipo = [];
foreach ($result_hipo as $row) {
    // Convertir la fecha a un formato legible por el usuario
    $fechas_hipo[] = date("d/m/Y", strtotime($row['fecha_control'])); // Formato legible
    $valores_hipo[] = $row['promedio'];
}

// Cerrar la conexión
$pdo = null;
?>



<!DOCTYPE html>
<html>
<head>
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
        type: 'bar',
        data: {
            labels: <?php echo json_encode($fechas_hiper); ?>,
            datasets: [{
                label: 'Promedio Glucosa Hiperglucemia',
                data: <?php echo json_encode($valores_hiper); ?>,
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    // Gráfico Hipoglucemia
    const ctxHipo = document.getElementById('hipoChart').getContext('2d');
    new Chart(ctxHipo, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($fechas_hipo); ?>,
            datasets: [{
                label: 'Promedio Glucosa Hipoglucemia',
                data: <?php echo json_encode($valores_hipo); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</body>
</html>