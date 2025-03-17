<?php
require __DIR__ . '/../php/conexion.php';
session_start();

// Filtros por rango de fechas
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

$conn->close(); // Cerrar conexión
var_dump($fechas_hipo);
var_dump($fechas_hiper);
var_dump($valores_hipo);
var_dump($valores_hiper);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas de Glucosa</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>

</head>
<body>

    <h1>Filtrar Estadísticas por Rango de Fechas</h1>
    <form method="POST">
        <label for="fecha_inicio">Fecha Inicio:</label>
        <input type="date" id="fecha_inicio" name="fecha_inicio" required>
        
        <label for="fecha_fin">Fecha Fin:</label>
        <input type="date" id="fecha_fin" name="fecha_fin" required>
        
        <button type="submit">Buscar</button>
    </form>
<?php
if($_POST['fecha_inicio']!=null && $_POST['fecha_fin']!=null ){
?>
    <h2>Fechas</h2>
    <?php echo $fecha_inicio; ?>
    <?php echo $fecha_fin; ?>
    <h2>Estadísticas de Hiperglucemia</h2>
    <canvas id="hiperChart"></canvas>
    
    <h2>Estadísticas de Hipoglucemia</h2>
    <canvas id="hipoChart"></canvas>
    
    <script>
        // Función para generar gráficos
        const configChart = (ctx, label, fechas, valores, color) => {
            return new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: fechas,
                    datasets: [{
                        label: label,
                        data: valores,
                        borderColor: color,
                        backgroundColor: color,
                        fill: false,
                        tension: 0.3 // Suaviza la curva
                    }]
                },
                options: {
                    responsive: true,
                    parsing: false, // Evita errores en fechas
                    scales: {
                        x: {
                            type: 'time',
                            time: {
                                unit: 'day',
                                tooltipFormat: 'yyyy-MM-dd',
                                displayFormats: {
                                    day: 'yyyy-MM-dd'
                                }
                            },
                            title: {
                                display: true,
                                text: 'Fecha'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Nivel de Glucosa'
                            },
                            beginAtZero: false
                        }
                    }
                }
            });
        };

        // Crear gráficos dinámicos con datos de PHP
        configChart(
            document.getElementById('hiperChart').getContext('2d'),
            'Promedio Glucosa Hiperglucemia',
            <?php echo json_encode($fechas_hiper); ?>,
            <?php echo json_encode($valores_hiper); ?>,
            'rgba(255, 99, 132, 1)'
        );

        configChart(
            document.getElementById('hipoChart').getContext('2d'),
            'Promedio Glucosa Hipoglucemia',
            <?php echo json_encode($fechas_hipo); ?>,
            <?php echo json_encode($valores_hipo); ?>,
            'rgba(54, 162, 235, 1)'
        );
        console.log(<?php echo json_encode($fechas_hipo); ?>);
        console.log(<?php echo json_encode($valores_hipo); ?>);
        console.log(<?php echo json_encode($fechas_hiper); ?>);
        console.log(<?php echo json_encode($valores_hiper); ?>);
    </script>
<?php }?>
</body>
</html>