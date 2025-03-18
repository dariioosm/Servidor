<?php
//session_start();
$host="localhost";
$dbname="diabetesdb";
$user="root";
$pass="";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>