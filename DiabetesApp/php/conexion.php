<?php
session_start();
$host="localhost";
$dbname="diabetesdb";
$user="cliente";
$pass="fA2AtIovlGvW]1Rb";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>