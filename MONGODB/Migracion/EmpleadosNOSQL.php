<?php

// Conexión a MySQL
$serversql = 'localhost';
$usersql = 'root';
$passsql = '';
$bdsql = 'empresa';
$conn_sql = new mysqli($serversql, $usersql, $passsql, $bdsql);

if ($conn_sql->connect_error) {
    die('Conexión fallida a MySQL: ' . $conn_sql->connect_error);
}

require '../vendor/autoload.php';

$clienteMongo = new MongoDB\Client('mongodb://localhost:27017');
$bd_mongo = $clienteMongo->empresa;
$coleccion_empleados = $bd_mongo->empleados;

$sql = "SELECT CodEmple, Nombre, Apellido1, Apellido2, Departamento FROM empleados";
$result = $conn_sql->query($sql);

if ($result->num_rows > 0) {
    // Usar insertMany para insertar todos los registros a la vez
    $empleados = [];
    while ($empleado = $result->fetch_assoc()) {
        $empleados[] = [
            'CodEmple' => $empleado['CodEmple'],
            'Nombre' => $empleado['Nombre'],
            'Apellido1' => $empleado['Apellido1'],
            'Apellido2' => $empleado['Apellido2'],
            'Departamento' => $empleado['Departamento']
        ];
    }

    // Insertar todos los empleados a la vez en MongoDB
    $insertado = $coleccion_empleados->insertMany($empleados);

    if ($insertado->getInsertedCount() > 0) {
        echo "Migración completada. Se insertaron {$insertado->getInsertedCount()} empleados en MongoDB.\n";
    } else {
        echo "No se insertaron empleados en MongoDB.\n";
    }
} else {
    echo "No se encontraron empleados en MySQL.\n";
}

$conn_sql->close();
?>
