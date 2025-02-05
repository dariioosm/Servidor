<?php
//*conexion a mongodb

require '../vendor/autoload.php';
$clienteMongo = new MongoDB\Client('mongodb://localhost:27017');
$bdMongo= $clienteMongo->perros;
$coleccion_perros=$bdMongo->peligrosos;



//conexion a mysql
$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$bdsql = 'perros';
$conn= new mysqli($servidor,$usuario,$contraseña,$bdsql);

if ($conn->connect_error) {
    die("Error de conexión a MySQL: " . $conn->connect_error);
}

$insert= $conn->prepare("INSERT INTO peligrosos (descripcion, tamano, codigo_postal, barrio, numero) VALUES (descripcion, tamano, codigo_postal, barrio, numero)");

foreach($documento as $doc){
    $insert->execute([
        'descripcion'=>$doc['descripcion'] ?? null,
        'tamano'=>$doc['tamaÑo']??null,
        'codigo_postal'=>$doc['codigo_posta']??null,
        'barrio'=>$doc['barrio']??null,
        'numero'=>$doc['numero']?? null
    ]);
}
$insert->close();
$conn->close();
?>