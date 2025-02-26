<?php
require 'conexion.php';
// Manejo de operaciones: agregar, actualizar y eliminar
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $accion = $_POST['accion'];
    $id = $_POST['id'] ?? null;
    $fecha_hora = $_POST['fecha_hora'] ?? '';
    $nivel_glucosa = $_POST['nivel_glucosa'] ?? '';
    $notas = $_POST['notas'] ?? '';
    if ($accion == 'agregar') {
        $sql = "INSERT INTO CONTROL_GLUCOSA (fecha_hora, nivel_glucosa, notas) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$fecha_hora, $nivel_glucosa, $notas])) {
            echo "Registro agregado con éxito.";
        } else {
            echo "Error al agregar registro.";
        }
    } elseif ($accion == 'editar' && $id) {
        $sql = "UPDATE CONTROL_GLUCOSA SET fecha_hora = ?, nivel_glucosa = ?, notas = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$fecha_hora, $nivel_glucosa, $notas, $id])) {
            echo "Registro actualizado con éxito.";
        } else {
            echo "Error al actualizar registro.";
        }
    } elseif ($accion == 'eliminar' && $id) {
        $sql = "DELETE FROM CONTROL_GLUCOSA WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$id])) {
            echo "Registro eliminado con éxito.";
        } else {
            echo "Error al eliminar registro.";
        }
    }
}
// Obtener registros para mostrar
$registros = $pdo->query("SELECT * FROM CONTROL_GLUCOSA ORDER BY fecha_control DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Agregar Control de Glucosa</h2>
<form method="post">
    <input type="hidden" name="accion" value="agregar">
    <input type="datetime-local" name="fecha_hora" required>
    <input type="number" name="nivel_glucosa" placeholder="Nivel de glucosa (mg/dL)" required>
    <input type="text" name="notas" placeholder="Notas (opcional)">
    <button type="submit">Agregar</button>
</form>
<h2>Registros de Glucosa</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Fecha y Hora</th>
        <th>Nivel de Glucosa</th>
        <th>Notas</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($registros as $registro): ?>
    <tr>
        <td><?php echo htmlspecialchars($registro['id']); ?></td>
        <td><?php echo htmlspecialchars($registro['fecha_hora']); ?></td>
        <td><?php echo htmlspecialchars($registro['nivel_glucosa']); ?></td>
        <td><?php echo htmlspecialchars($registro['notas']); ?></td>
        <td>
            <form method="post" style="display:inline;">
                <input type="hidden" name="accion" value="eliminar">
                <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">
                <button type="submit" onclick="return confirm('¿Eliminar este registro?')">Eliminar</button>
            </form>
            <form method="post" style="display:inline;">
                <input type="hidden" name="accion" value="editar">
                <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">
                <input type="datetime-local" name="fecha_hora" value="<?php echo htmlspecialchars(date('Y-m-d\TH:i', strtotime($registro['fecha_hora']))); ?>" required>
                <input type="number" name="nivel_glucosa" value="<?php echo htmlspecialchars($registro['nivel_glucosa']); ?>" required>
                <input type="text" name="notas" value="<?php echo htmlspecialchars($registro['notas']); ?>">
                <button type="submit">Editar</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
