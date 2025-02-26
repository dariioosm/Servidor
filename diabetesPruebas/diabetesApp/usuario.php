<?php
require 'conexion.php';
// Manejo de operaciones: agregar, actualizar y eliminar
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $accion = $_POST['accion'];
    $id = $_POST['id'] ?? null;
    $nombre = $_POST['nombre'] ?? '';
    $apellidos = $_POST['apellidos'] ?? '';
    $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';
    $login = $_POST['login'] ?? '';
    $pass = !empty($_POST['pass']) ? password_hash($_POST['pass'], PASSWORD_DEFAULT) : null;
    
    if ($accion == 'agregar') {
        $sql = "INSERT INTO USUARIOS (nombre, apellidos, fecha_nacimiento, login, pass) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$nombre, $apellidos, $fecha_nacimiento, $login, $pass])) {
            echo "Usuario agregado con éxito.";
        } else {
            echo "Error al agregar usuario.";
        }
    } elseif ($accion == 'editar' && $id) {
        $sql = "UPDATE USUARIOS SET nombre = ?, apellidos = ?, fecha_nacimiento = ?, login = ?";
        $params = [$nombre, $apellidos, $fecha_nacimiento, $login];
        if ($pass) {
            $sql .= ", pass = ?";
            $params[] = $pass;
        }
        $sql .= " WHERE id_usuario  = ?";
        $params[] = $id;
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute($params)) {
            echo "Usuario actualizado con éxito.";
        } else {
            echo "Error al actualizar usuario.";
        }
    } elseif ($accion == 'eliminar' && $id) {
        $sql = "DELETE FROM USUARIOS WHERE id_usuario = ?";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$id])) {
            echo "Usuario eliminado con éxito.";
        } else {
            echo "Error al eliminar usuario.";
        }
    }
}

// Obtener usuarios para mostrar
$usuarios = $pdo->query("SELECT * FROM USUARIOS")->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Agregar Usuario</h2>
<form method="post">
    <input type="hidden" name="accion" value="agregar">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="text" name="apellidos" placeholder="Apellidos" required>
    <input type="date" name="fecha_nacimiento" required>
    <input type="text" name="login" placeholder="Usuario" required>
    <input type="password" name="pass" placeholder="Contraseña" required>
    <button type="submit">Agregar</button>
</form>

<h2>Usuarios Registrados</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Fecha Nacimiento</th>
        <th>Login</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($usuarios as $usuario): ?>
    <tr>
        <td><?php echo htmlspecialchars($usuario['id_usuario']); ?></td>
        <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
        <td><?php echo htmlspecialchars($usuario['apellidos']); ?></td>
        <td><?php echo htmlspecialchars($usuario['fecha_nacimiento']); ?></td>
        <td><?php echo htmlspecialchars($usuario['login']); ?></td>
        <td>
            <form method="post" style="display:inline;">
                <input type="hidden" name="accion" value="eliminar">
                <input type="hidden" name="id" value="<?php echo $usuario['id_usuario']; ?>">
                <button type="submit" onclick="return confirm('¿Eliminar este usuario?')">Eliminar</button>
            </form>
            <form method="post" style="display:inline;">
                <input type="hidden" name="accion" value="editar">
                <input type="hidden" name="id" value="<?php echo $usuario['id_usuario']; ?>">
                <input type="text" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
                <input type="text" name="apellidos" value="<?php echo htmlspecialchars($usuario['apellidos']); ?>" required>
                <input type="date" name="fecha_nacimiento" value="<?php echo htmlspecialchars($usuario['fecha_nacimiento']); ?>" required>
                <input type="text" name="login" value="<?php echo htmlspecialchars($usuario['login']); ?>" required>
                <input type="password" name="pass" placeholder="Nueva contraseña (opcional)">
                <button type="submit">Editar</button>
            </form>
        </td>
    </tr> 
    <?php endforeach; ?>
</table>
<?php
?>
