<?php
require '../vendor/autoload.php';

// Conexión a MongoDB
$clientMongo = new MongoDB\Client('mongodb://localhost:27017');
$bdMongo = $clientMongo->perros;  // Base de datos
$coleccion_perros = $bdMongo->peligrosos;  // Colección

// Carga el archivo JSON
$file = 'perros.json';
$jsonData = file_get_contents($file);

// Decodificar el JSON como array asociativo
$data = json_decode($jsonData, true);

if ($data === null) {
    die('Error al leer el archivo JSON: ' . json_last_error_msg());
}

// Verifica que cada objeto tenga los campos necesarios
foreach ($data as $index => $perro) {
    if (!isset($perro['descripcion'], $perro['tamaÑo'], $perro['codigo_postal'], $perro['barrio'], $perro['numero'])) {
        die("El perro en la posición $index no tiene la estructura esperada.");
    }
}