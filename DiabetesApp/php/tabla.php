<?php
require 'conexion.php'; 

$id_usuario = $_SESSION['id_usuario']; // Obtener el ID del usuario en sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];



    $select_registros = $conn->prepare(
        "SELECT cg.fecha_control, cg.glucosa_lenta, cg.indice_actividad,c.tipo_comida, c.raciones, c.glucosa_preingesta, c.insulina, c.glucosa_postingesta, hipo.glucosa_hipo, hipo.hora_hipo, hiper.glucosa_hiper, hiper.hora_hiper, hiper.unidades_correccion
            FROM control_glucosa cg
            LEFT JOIN comida c ON cg.id_usuario = c.id_usuario AND cg.fecha_control = c.fecha_control
            LEFT JOIN hipoglucemia hipo ON c.id_usuario = hipo.id_usuario AND c.fecha_control = hipo.fecha_control AND c.tipo_comida = hipo.tipo_comida
            LEFT JOIN hiperglucemia hiper ON c.id_usuario = hiper.id_usuario AND c.fecha_control = hiper.fecha_control AND c.tipo_comida = hiper.tipo_comida
            WHERE cg.id_usuario = ? AND cg.fecha_control BETWEEN ? AND ? ORDER BY cg.fecha_control ASC");
    if (!$select_registros) {
        die("Error en la consulta: " . $conn->error);
    }

    $select_registros->bind_param("iss", $id_usuario, $fecha_inicio, $fecha_fin);
    
    $select_registros->execute();
    
    $resultado = $select_registros->get_result();

    if ($resultado->num_rows > 0) {
        echo "<div class='table-responsive mt-4'>";
        echo "<table class='table table-bordered'>";
        echo "<thead class='table-dark'>";
        echo "<tr>
                <th>Fecha</th>
                <th>Glucosa Lenta</th>
                <th>Índice Actividad</th>
                <th>Tipo Comida</th>
                <th>Raciones</th>
                <th>Glucosa Pre-ingesta</th>
                <th>Insulina</th>
                <th>Glucosa Post-ingesta</th>
                <th>Glucosa Hipo</th>
                <th>Hora Hipo</th>
                <th>Glucosa Hiper</th>
                <th>Hora Hiper</th>
                <th>Unidades Corrección</th>
            </tr>";
        echo "</thead><tbody>";

        while ($row = $resultado->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['fecha_control']}</td>
                    <td>{$row['glucosa_lenta']}</td>
                    <td>{$row['indice_actividad']}</td>
                    <td>{$row['tipo_comida']}</td>
                    <td>{$row['raciones']}</td>
                    <td>{$row['glucosa_preingesta']}</td>
                    <td>{$row['insulina']}</td>
                    <td>{$row['glucosa_postingesta']}</td>
                    <td>{$row['glucosa_hipo']}</td>
                    <td>{$row['hora_hipo']}</td>
                    <td>{$row['glucosa_hiper']}</td>
                    <td>{$row['hora_hiper']}</td>
                    <td>{$row['unidades_correccion']}</td>
                </tr>";
        }
        echo "</tbody></table></div>";
    } else {
        echo "<p class='mt-3 alert alert-warning'>No hay registros en el rango seleccionado.</p>";
    }
    
    $select_registros->close();
    $conn->close();
}
?>
