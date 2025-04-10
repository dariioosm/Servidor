<?php
require('conexion.php');
session_start();
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
            <th>codigo de usuario</th>
            <th>Nombre usuario</th>
            <th>Aciertos</th>
            <th>Barra</th>
        </tr>
        <?php
            $filas = $resultado->num_rows;
            for($i =0; $i<$filas;$i++){
                echo '<tr>';
                $resultado->data_seek($i);
                echo'<td>'.htmlspecialchars($resultado->fetch_assoc()['Codigo']).'</td>';
                echo'<td>'.htmlspecialchars($resultado->fetch_assoc()['Nombre']).'</td>';
                echo'<td>'.htmlspecialchars($resultado->fetch_assoc()['aciertos']).'</td>';
                echo "<td><div class='barra' style='width: " . (htmlspecialchars($resultado->fetch_assoc()['aciertos']) * 10) . "px;'></div></td>";
                echo '</tr>';

                var_dump($resultado->fetch_all());
            }
            

        ?>
    </table>
</body>
</html>
<?php
$conn->close();
?>