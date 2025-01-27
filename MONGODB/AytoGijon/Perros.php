<?php
 require '../vendor/autoload.php';

$clientMongo = new MongoDB\Client('mongodb://localhost:27017');
$bdMongo = $clientMongo->perros;
$coleccion_perros = $bdMongo->peligrosos;

$file = 'perros.json';
$jsonData = file_get_contents($file);
//? convierte el json en un array asociativo
$data = json_decode($jsonData, true);
if ($data == null) {
    die('Error al leer el archivo JSON');
}

// Asegurarse de acceder al array correcto
$perros = isset($data['animal']) ? $data['animal'] : [];

if (empty($perros)) {
    die('No se encontraron perros en el JSON.');
}

// Verificar la estructura de los datos
var_dump($perros);  // Asegúrate de que contiene un array de objetos

// Intentar insertar los perros en MongoDB
try {
    $insert = $coleccion_perros->insertMany($perros);  // Insertar muchos documentos
    echo "Se han insertado {$insert->getInsertedCount()} perros.\n";
} catch (Exception $e) {
    echo 'Error al insertar los documentos: ' . $e->getMessage();
}

?>
