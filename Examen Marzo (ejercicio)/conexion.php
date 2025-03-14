<?php
$host = 'localhost';
$dbname = 'pictogramasphp';
$user = 'root'; // Cambiar si es necesario
$pass = ''; // Cambiar si es necesario

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>