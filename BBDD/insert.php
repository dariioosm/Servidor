<?php
require_once 'login.php';
$connect = new mysqli($hn,$un,$pw,$db);
if($connect->connect_error)die('Fatal error');
if($connect->connect_errno){
    printf('Fallo de conexion: %s\n',$connect->connect_errno);
    exit();
}

$query = "INSERT INTO usuarios (USU,CONTRA,ROL) VALUES ('yolanda','yolanda','jugador')";
$resultado=$connect->query($query);

$connect->close();
?>