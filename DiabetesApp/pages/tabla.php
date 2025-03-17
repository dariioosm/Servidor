<?php
require __DIR__ . '/../php/conexion.php';
session_start();
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

// Consulta para hiperglucemia
$stmt_hiper = $conn->prepare("SELECT * FROM hiperglucemia WHERE fecha_control BETWEEN ? AND ?");
$stmt_hiper->bind_param('ss', $fecha_inicio, $fecha_fin);
$stmt_hiper->execute();
$result_hiper = $stmt_hiper->get_result();
while ($row = $result_hiper->fetch_assoc()) {
    $datos['hiperglucemia'][] = $row;
}
$stmt_hiper->close();

// Consulta para hipoglucemia
$stmt_hipo = $conn->prepare("SELECT * FROM hipoglucemia WHERE fecha_control BETWEEN ? AND ?");
$stmt_hipo->bind_param('ss', $fecha_inicio, $fecha_fin);
$stmt_hipo->execute();
$result_hipo = $stmt_hipo->get_result();
while ($row = $result_hipo->fetch_assoc()) {
    $datos['hipoglucemia'][] = $row;
}
$stmt_hipo->close();

// Consulta para control de glucosa
$stmt_control = $conn->prepare("SELECT * FROM control_glucosa WHERE fecha_control BETWEEN ? AND ?");
$stmt_control->bind_param('ss', $fecha_inicio, $fecha_fin);
$stmt_control->execute();
$result_control = $stmt_control->get_result();
while ($row = $result_control->fetch_assoc()) {
    $datos['control_glucosa'][] = $row;
}
$stmt_control->close();

// Consulta para tipos de comida
$stmt_comida = $conn->prepare("SELECT * FROM comida WHERE fecha BETWEEN ? AND ?");
$stmt_comida->bind_param('ss', $fecha_inicio, $fecha_fin);
$stmt_comida->execute();
$result_comida = $stmt_comida->get_result();
while ($row = $result_comida->fetch_assoc()) {
    $datos['comida'][] = $row;
}
$stmt_comida->close();

$conn->close(); // Cerrar conexión
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualización de Datos de Glucosa</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>Filtrar Datos por Rango de Fechas</h1>
<form method="POST">
    <label for="fecha_inicio">Fecha Inicio:</label>
    <input type="date" id="fecha_inicio" name="fecha_inicio" required>
    
    <label for="fecha_fin">Fecha Fin:</label>
    <input type="date" id="fecha_fin" name="fecha_fin" required>
    
    <button type="submit">Buscar</button>
</form>

<?php if ($fecha_inicio && $fecha_fin): ?>
    <h2>Datos de Hiperglucemia</h2>
    <table>
        <thead>
            <tr>
                <th>Fecha Control</th>
                <th>Glucosa Hiper</th>
                <th>Otros Campos...</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($datos['hiperglucemia'])): ?>
                <tr><td colspan="3">No hay datos disponibles.</td></tr>
            <?php else: ?>
                <?php foreach ($datos['hiperglucemia'] as $row): ?>
                    <tr>
                        <td><?php echo $row['fecha_control']; ?></td>
                        <td><?php echo $row['glucosa_hiper']; ?></td>
                        <td>...</td> <!-- Otros campos aquí -->
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <h2>Datos de Hipoglucemia</h2>
    <table>
        <thead>
            <tr>
                <th>Fecha Control</th>
                <th>Glucosa Hipo</th>
                <th>Otros Campos...</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($datos['hipoglucemia'])): ?>
                <tr><td colspan="3">No hay datos disponibles.</td></tr>
            <?php else: ?>
                <?php foreach ($datos['hipoglucemia'] as $row): ?>
                    <tr>
                        <td><?php echo $row['fecha_control']; ?></td>
                        <td><?php echo $row['glucosa_hipo']; ?></td>
                        <td>...</td> <!-- Otros campos aquí -->
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <h2>Datos de Control de Glucosa</h2>
    <table>
        <thead>
            <tr>
                <th>Fecha Control</th>
                <th>Glucosa Control</th>
                <th>Otros Campos...</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($datos['control_glucosa'])): ?>
                <tr><td colspan="3">No hay datos disponibles.</td></tr>
            <?php else: ?>
                <?php foreach ($datos['control_glucosa'] as $row): ?>
                    <tr>
                        <td><?php echo $row['fecha_control']; ?></td>
                        <td><?php echo $row['glucosa_control']; ?></td>
                        <td>...</td> <!-- Otros campos aquí -->
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <h2>Datos de Comida</h2>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Tipo de Comida</th>
                <th>Otros Campos...</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($datos['comida'])): ?>
                <tr><td colspan="3">No hay datos disponibles.</td></tr>
            <?php else: ?>
                <?php foreach ($datos['comida'] as $row): ?>
                    <tr>
                        <td><?php echo $row['fecha']; ?></td>
                        <td><?php echo $row['tipo_comida']; ?></td>
                        <td>...</td> <!-- Otros campos aquí -->
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>

</body>
</html>
