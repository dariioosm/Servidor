<?php
// Requiere el autoload de Composer
require 'vendor/autoload.php'; 

// Configura la conexión a MongoDB
$uri = "mongodb://localhost:27017"; 
$client = new MongoDB\Client($uri);

// Selecciona la base de datos
$db = $client->baserelacional; // Reemplaza con el nombre de tu base de datos

// Selecciona la colección
$collection = $db->usuarios; // La colección 'usuarios' será creada automáticamente si no existe

// Crea un nuevo documento para agregar a la colección
$documento = [
    'nombre' => 'Juan Pérez',
];

// Inserta el documento en la colección
$resultado = $collection->insertOne($documento);

// Verifica si el documento fue insertado correctamente
if ($resultado->getInsertedCount() === 1) {
    echo "Documento insertado correctamente";
} else {
    echo "Error al insertar el documento";
}
?>
