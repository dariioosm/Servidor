<?php
require('conexion.php');
$datos=$conn->prepare("SELECT u.Codigo, u.Nombre, j.aciertos AS aciertos FROM usuarios u LEFT JOIN 
                                    (SELECT codigousu, COUNT(*) AS aciertos FROM jugadas WHERE acierto = 1 GROUP BY codigousu) j ON u.Codigo = j.codigousu");

$datos->execute();
$resultado = $datos->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        table {
            border: 1px solid black;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
        }
        .barra {
            background-color: blue;
            height: 20px;
        }
    </style>
    <h2>Las estadisticas de los usuarios son</h2>
    <table>
        <tr>
            <th>Nombre usuario</th>
            <th>Aciertos</th>
            <th>Barra</th>
        </tr>
        <?php
            $filas = $resultado->num_rows;
            for($i =0; $i<$filas;$i++){
                $resultado->data_seek($i);
                $dato=$resultado->fetch_assoc();
                $nombre = htmlspecialchars($dato['Nombre']);
                $aciertos = intval($dato['aciertos']); 
                echo '<tr>';
            echo "<td>{$nombre}</td>";
            echo "<td>{$aciertos}</td>";
            echo "<td><div class='barra' style='width: " . ($aciertos * 10) . "px;'></div></td>";
            echo '</tr>';
            }
            

        ?>
    </table>
    <a href="index.php">Salir del juego</a>
</body>
</html>
<?php
$conn->close();
?>