<?php 
require_once 'login.php';
$connection = new mysqli($hn, $un, $pw, $db);
if ($connection->connect_error) die("Fatal Error");
$consulta = "DELETE FROM usuarios  WHERE USU LIKE 'yolanda' ";
$result = $connection->query($consulta);
$connection -> close();
?>