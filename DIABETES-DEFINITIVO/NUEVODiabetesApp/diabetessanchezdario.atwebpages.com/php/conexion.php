<?php
//session_start();
$host="fdb1028.awardspace.net";
$dbname="4597049_diabetesdb";
$user="4597049_diabetesdb";
$pass=")x4n-.QF9R^i}s#B";
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>