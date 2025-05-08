<?php
require 'conexion.php';
session_start();

$identificador = $conn->prepare('SELECT id FROM usuarios WHERE usuario = ?');
$identificador->bind_param('s', $_SESSION['usuario']);
$identificador->execute();
$resultado = $identificador->get_result();

if ($resultado && $fila = $resultado->fetch_assoc()) {
    $usuarioId = $fila['id'];  
} 

$notas = $conn->prepare('SELECT asignatura, nota FROM notas WHERE alumno = ?');
$notas->bind_param('i', $usuarioId);
$notas->execute();
$info = $notas->get_result();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notas</title>
</head>
<body>
    <h2> <?php echo $_SESSION['usuario']; ?> estas son tus notas</h2>

    <h3>Notas:</h3>
<?php if ($info->num_rows > 0): ?>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Asignatura</th>
                <th>Nota</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($fila = $info->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($fila['asignatura']); ?></td>
                    <td><?php echo htmlspecialchars($fila['nota']); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a href="alumno.php">Volver al menu de alumno</a>
</body>
</html>
