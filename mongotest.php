<?php
// Conectar a MongoDB (localhost:27017 es el valor predeterminado)
$client = new MongoDB\Client("mongodb://localhost:27017");

// Seleccionar la base de datos (se creará si no existe)
$database = $client->testDB; // 'testDB' es el nombre de la base de datos

// Seleccionar o crear una colección (se creará si no existe)
$collection = $database->testCollection; // 'testCollection' es el nombre de la colección

// Crear un documento de prueba
$document = [
    'name' => 'John Doe',
    'email' => 'john.doe@example.com',
    'age' => 30,
    'date' => new MongoDB\BSON\UTCDateTime() // Fecha de inserción
];

// Insertar el documento en la colección
$insertResult = $collection->insertOne($document);

// Mostrar el ID del documento insertado
echo "Documento insertado con ID: " . $insertResult->getInsertedId() . "<br>";

// Consultar el documento insertado
$retrievedDocument = $collection->findOne(['name' => 'John Doe']);

// Mostrar el documento recuperado
if ($retrievedDocument) {
    echo "<h3>Documento recuperado:</h3>";
    echo "Nombre: " . $retrievedDocument['name'] . "<br>";
    echo "Email: " . $retrievedDocument['email'] . "<br>";
    echo "Edad: " . $retrievedDocument['age'] . "<br>";
    echo "Fecha: " . $retrievedDocument['date']->toDateTime()->format('Y-m-d H:i:s') . "<br>";
} else {
    echo "No se encontró el documento.<br>";
}

// Verificar si se conectó correctamente a MongoDB
echo "<h3>Conexión exitosa a MongoDB</h3>";
?>
