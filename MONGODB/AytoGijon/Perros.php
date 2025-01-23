<?php 
require '../vendor/autoload.php';
$clientMongo= new MongoDB\Client('mongodb://localhost:27017');
$bdMongo=$clientMongo->perros;
$coleccion_perros=$bd_mongo->peligrosos;
$file='perros.json';
$jsonData=file_get_contents($file);
$perros=json_decode($jsonData,true);
if($perros==null){
    die('Error al encontrar perros.json');
}

$insert = $coleccion_perros->insertMany($perros);

if($insert->getInsertedCount()>0){
    echo "Se han insertado {$insert->getInsertedCount()} perros peligrosos en MongoDB \n";
}else{
    echo "No se han insertado PPP en MongoDB";
}

?>