<?php // query-mysqli.php
 require_once 'login.php';
 $connection = new mysqli($hn, $un, $pw, $db);
 if ($connection->connect_error) die("Fatal Error");
 $query = "SELECT USU,CONTRA FROM usuarios";
 $result = $connection->query($query);
 if (!$result) die("Fatal Error");
 $rows = $result->num_rows;
 for ($j = 0 ; $j < $rows ; ++$j)
 {
 $result->data_seek($j);
 echo 'Usuario: ' .htmlspecialchars($result->fetch_assoc()['USU']) .'<br>';
 $result->data_seek($j);
 echo 'Constraseña: ' .htmlspecialchars($result->fetch_assoc()['CONTRA']) .'<br>';
 $result->data_seek($j);
 } 
 $result->close();
 $connection->close();
?>