
<?php
$host="localhost";
$dbname="bdconsignas";
$user="root";
$pass="";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

?>