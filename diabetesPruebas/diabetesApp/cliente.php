<?php
require 'conexion.php';
// Login de Usuario
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT id_usuario, pass FROM Usuario WHERE login = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id_usuario, $hashed_password);
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            $_SESSION['id_usuario'] = $id_usuario;
        } else {
            echo "<p>Contraseña incorrecta.</p>";
        }
    } else {
        echo "<p>Usuario no encontrado.</p>";
    }
}
// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
// Verificar si el usuario está logueado
if (!isset($_SESSION['id_usuario'])) {
    echo '<h2>Login de Usuario</h2>';
    echo '<form method="POST">';
    echo 'Usuario: <input type="text" name="username" required><br>';
    echo 'Contraseña: <input type="password" name="password" required><br>';
    echo '<button type="submit" name="login">Iniciar Sesión</button>';
    echo '</form>';
    exit();
}
$id_usuario = $_SESSION['id_usuario'];
// Panel de Usuario
echo '<h2>Panel de Usuario</h2>';
echo '<a href="?logout=true">Cerrar Sesión</a><br><br>';
$tablas = ['Control_Glucosa', 'Comida', 'Hiperglucemia', 'Hipoglucemia'];
foreach ($tablas as $tabla) {
    echo "<h3>$tabla</h3>";
    echo "<a href='{$tabla}_add.php?id_usuario=$id_usuario'>Añadir</a> | ";
    echo "<a href='{$tabla}_edit.php?id_usuario=$id_usuario'>Modificar</a> | ";
    echo "<a href='{$tabla}_delete.php?id_usuario=$id_usuario'>Eliminar</a> | ";
    echo "<a href='{$tabla}_view.php?id_usuario=$id_usuario'>Visualizar</a><br><br>";
}
$pdo->close();
?>
