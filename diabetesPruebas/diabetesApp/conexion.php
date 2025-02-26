<?php
session_start();
$host="localhost";
$dbname="diabetesdb";
$user="root";
$pass="";
try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    ) ;}
    catch(PDOException $e){
    die("Error de conexion: ".$e->getmessage());
}

?>