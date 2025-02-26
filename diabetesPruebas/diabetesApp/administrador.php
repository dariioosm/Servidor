<?php
require 'conexion.php';
// Login de Administrador
if (isset($_POST['login'])) {
    $admin_user = $_POST['username'];
    $admin_pass = $_POST['password'];

    // Validación básica (reemplazar con lógica segura en producción)
    if ($admin_user === 'admin' && $admin_pass === 'admin123') {
        $_SESSION['admin'] = true;
    } else {
        echo "<p>Usuario o contraseña incorrectos.</p>";
    }
}
// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
// Verificar si el admin está logueado
if (!isset($_SESSION['admin'])) {
    echo '<h2>Login de Administrador</h2>';
    echo '<form method="POST">';
    echo 'Usuario: <input type="text" name="username" required><br>';
    echo 'Contraseña: <input type="password" name="password" required><br>';
    echo '<button type="submit" name="login">Iniciar Sesión</button>';
    echo '</form>';
    exit();
}
// Panel de Control
echo '<h2>Panel de Control - Administrador</h2>';
echo '<a href="?logout=true">Cerrar Sesión</a><br><br>';
$tablas = ['Usuario', 'Control_Glucosa', 'Comida', 'Hiperglucemia', 'Hipoglucemia'];
foreach ($tablas as $tabla) {
    echo "<h3>$tabla</h3>";
    echo "<a href='{$tabla}_add.php'>Añadir</a> | ";
    echo "<a href='{$tabla}_edit.php'>Modificar</a> | ";
    echo "<a href='{$tabla}_delete.php'>Eliminar</a> | ";
    echo "<a href='{$tabla}_view.php'>Visualizar</a><br><br>";
}
?>
