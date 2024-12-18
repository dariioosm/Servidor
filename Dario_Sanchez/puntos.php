<?php

?>
zdf
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    table{
        border-collapse: collapse;
    }
    th{
        background-color:blue;
        color:white;
        padding:5px;
    }
    td{
        width: 30px;
        height: 30px;
        text-align:center;
        border: 1px solid black;
    }
</style>
</head>
<body>
    <?php
            require_once 'conexion.php';
            session_start();
            
            //TODO hacer una consulta en la que salgan todos los login y su puntuacion;
            $conn= new mysqli($servername, $username, $password, $dbname);
            $query="SELECT login, puntos from jugador ";
            $result= $conn -> query($query);
            $filas=$result->num_rows;

        echo '
            <table>
            <tr>
                <th>Login</th> <th>Puntos</th>
            </tr>
        ';
        //TODO empezar por la primera fila de la tabla
        for($i=0;$i<$filas;$i++){
            echo '<tr>'.'<td>'. htmlspecialchars($result->fetch_assoc()['login']).'</td>';
        }for($j=0;$j<$filas;$j++){
            echo '<td>'. htmlspecialchars($result->fetch_assoc()['puntos']).'</td>'.'</tr>';
        }
        echo'</table';

        
    ?>
</body>
</html>