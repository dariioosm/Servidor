<?php 
require '../vendor/autoload.php';
$clientMongo = new MongoDB\Client('mongodb://localhost:27017');
$bdMongo = $clientMongo->perros;
$coleccion_perros = $bdMongo->peligrosos;

$file = 'perros.json';
$jsonData = file_get_contents($file);

$perros = json_decode($jsonData, true);
if ($perros == null) {
    die('Error al leer el archivo JSON');
}

foreach ($perros as $perro) {
    // Insertar un perro a la vez en MongoDB
    $insert = $coleccion_perros->insertOne($perro);
    if ($insert->getInsertedCount() > 0) {
        echo "Perro insertado: {$perro['nombre']} \n";
    } else {
        echo "Error al insertar el perro: {$perro['nombre']} \n";
    }
}
?>
