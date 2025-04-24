<?php
require 'conexion.php';
session_start();

$notas= $conn->prepare('SELECT alumno,asignatura,nota from notas');
$notas->execute();
$info=$notas->get_result();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
     table {
            border: 1px solid black;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
        }
</style>
<body>
    <table>
        <thead>
            <th>Alumno ID</th>
            <th>Asignatura</th>
            <th>Nota</th>
            <?php
                $filas= $info->num_rows;
                for($i=0;$i<$filas;$i++){
                    $info->data_seek($i);
                    $dato = $info->fetch_assoc();
                    $id=htmlspecialchars($dato['alumno']);
                    $asignatura=htmlspecialchars($dato['asignatura']);
                    $nota=intval($dato['nota']);

                    echo'<tr>';
                    echo '<td>'.$id.'</td>';
                    echo '<td>'.$asignatura.'</td>';
                    echo '<td>'.$nota.'</td>';
                    echo'</td>';
                }
            ?>
        </thead>
    </table>
</body>
</html>
<?php $conn->close();?>