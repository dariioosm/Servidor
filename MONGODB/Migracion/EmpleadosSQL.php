<?php

$servidor = "localhost:8080";
$usuario = "root";
$contraseña = "";

// Crear la conexión
$conn = new mysqli($servidor, $usuario, $contraseña);

// Comprobar si hay error en la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

//! esto lo hace un administrador de la base de datos

// Seleccionar la base de datos
$nombre_bd = 'empresa';
$conn->select_db($nombre_bd); // Aquí seleccionamos la base de datos

// Crear la tabla si no existe
$sql = "CREATE TABLE IF NOT EXISTS empleados (
    CodEmple INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(50) NOT NULL,
    Apellido1 VARCHAR(50) NOT NULL,
    Apellido2 VARCHAR(50) NOT NULL,
    Departamento VARCHAR(50) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabla 'empleados' creada o ya existe.\n";
} else {
    echo "Error al crear la tabla: " . $conn->error . "\n";
}

// Lista de empleados
$empleados = [
    ['Juan', 'Pérez', 'González', 'Ventas'],
    ['Ana', 'López', 'Martínez', 'Marketing'],
    ['Carlos', 'García', 'Fernández', 'TI'],
    ['Maria', 'Rodríguez', 'López', 'Contabilidad'],
    ['David', 'Hernández', 'González', 'Ventas'],
    ['Laura', 'Martínez', 'Fernández', 'RRHH'],
    ['José', 'Pérez', 'López', 'Marketing'],
    ['Isabel', 'Sánchez', 'Torres', 'Ventas'],
    ['Pedro', 'Gómez', 'Vázquez', 'TI'],
    ['Lucía', 'Torres', 'Morales', 'Marketing'],
    ['Raúl', 'Díaz', 'Jiménez', 'Ventas'],
    ['Marta', 'García', 'López', 'Contabilidad'],
    ['Alberto', 'Rodríguez', 'González', 'Ventas'],
    ['Paula', 'Fernández', 'Serrano', 'TI'],
    ['Antonio', 'Pérez', 'Hernández', 'Marketing'],
    ['Carmen', 'Gómez', 'López', 'Contabilidad'],
    ['Ricardo', 'Jiménez', 'Morales', 'RRHH'],
    ['Cristina', 'Sánchez', 'Vázquez', 'Ventas'],
    ['Luis', 'González', 'Rodríguez', 'TI'],
    ['Elena', 'Hernández', 'Gómez', 'Marketing'],
    ['Javier', 'Martínez', 'Pérez', 'Ventas'],
    ['Patricia', 'Torres', 'Fernández', 'Contabilidad'],
    ['Eduardo', 'López', 'Sánchez', 'TI'],
    ['Esteban', 'Pérez', 'Vázquez', 'Ventas'],
    ['Sofía', 'González', 'López', 'Marketing'],
    ['Felipe', 'Jiménez', 'Rodríguez', 'TI'],
    ['Juliana', 'Torres', 'Gómez', 'RRHH'],
    ['Simón', 'García', 'Morales', 'Ventas'],
    ['Verónica', 'Rodríguez', 'Hernández', 'Contabilidad'],
    ['Fernando', 'Martínez', 'Jiménez', 'Marketing'],
    ['Rosario', 'Sánchez', 'González', 'TI'],
    ['Ignacio', 'López', 'Torres', 'Ventas'],
    ['Marina', 'Pérez', 'Morales', 'RRHH'],
    ['Héctor', 'Fernández', 'Gómez', 'Ventas'],
    ['Ángela', 'Gómez', 'Rodríguez', 'Contabilidad'],
    ['Joaquín', 'López', 'Sánchez', 'TI'],
    ['Sara', 'Rodríguez', 'Vázquez', 'Ventas'],
    ['José Luis', 'Torres', 'González', 'Marketing'],
    ['Elisa', 'Martínez', 'López', 'RRHH'],
    ['Raquel', 'García', 'Morales', 'Ventas'],
    ['Antonio', 'Hernández', 'Vázquez', 'TI'],
    ['Patricia', 'Fernández', 'Torres', 'Marketing'],
    ['Santiago', 'Pérez', 'Gómez', 'Ventas'],
    ['Andrea', 'López', 'González', 'TI'],
    ['Alba', 'Sánchez', 'Martínez', 'Contabilidad'],
    ['Manuel', 'Rodríguez', 'Pérez', 'Ventas'],
    ['Oscar', 'Jiménez', 'González', 'RRHH'],
    ['Beatriz', 'Gómez', 'Fernández', 'Ventas'],
    ['Carlos', 'Fernández', 'Torres', 'Marketing'],
    ['Ricardo', 'López', 'Sánchez', 'TI']
];

// Preparar la consulta de inserción
$stmt = $conn->prepare("INSERT INTO empleados (Nombre, Apellido1, Apellido2, Departamento) VALUES (?, ?, ?, ?)");

// Ejecutar la inserción para cada empleado
foreach ($empleados as $empleado) {
    $stmt->bind_param("ssss", $empleado[0], $empleado[1], $empleado[2], $empleado[3]);
    if ($stmt->execute()) {
        echo "Empleado " . $empleado[0] . " " . $empleado[1] . " " . $empleado[2] . " insertado correctamente.\n";
    } else {
        echo "Error al insertar empleado " . $empleado[0] . " " . $empleado[1] . " " . $empleado[2] . ".\n";
    }
}

// Cerrar la declaración y la conexión
$stmt->close();
$conn->close();
?>
