<?php
// Parámetros de conexión
$servidor = "localhost";
$usuario = "root";
$contraseña = "";

// Crear la conexión
$conn = new mysqli($servidor, $usuario, $contraseña);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Nombre de la base de datos a crear
$nombre_bd = "mi_nueva_base_de_datos";

// SQL para crear la base de datos
$sql = "CREATE DATABASE IF NOT EXISTS $nombre_bd";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo "Base de datos '$nombre_bd' creada exitosamente.";
} else {
    echo "Error al crear la base de datos: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
