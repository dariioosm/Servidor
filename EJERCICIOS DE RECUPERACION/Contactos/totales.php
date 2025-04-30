<?php
require 'conexion.php';
session_start();

/* 
* AL USAR UNA CONSULTA LEFT JOIN, SALEN TODOS LOS USUARIOS QUE ESTAN EN LA TABLA.
*(TENGAN O NO CONTACTOS AGREGADOS A LA CUENTA)
* POR OTRO LADO, SI SE UTILIZADA UNA INNER JOIN, SÓLO SALDRÍAN LOS QUE TUVIERAN AL MENOS, 1 CONTACTO REGISTRADO
*/
//? esta query selecciona los campos nombre y codigo de la tabla usuario
//? hace una subconsulta en la que se agrupan los contactos por codigo de usuario y se cuentan

$circulitos = $conn->prepare('
    SELECT u.Codigo, u.Nombre, c.contactos AS contactos 
    FROM usuarios u 
    LEFT JOIN (
        SELECT codusuario, COUNT(*) AS contactos 
        FROM contactos 
        GROUP BY codusuario
    ) c ON u.Codigo = c.codusuario
');


$circulitos->execute();
$resultado = $circulitos->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactos por Usuario</title>
    <style>
        .circulitos {
            background-color: blue;
            height: 30px;
            width: 30px;
            border-radius: 50px;
            display: inline-block;
            margin: 2px;
        }
    </style>
</head>
<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?></h1>
    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Código usuario</th>
                <th>Nombre</th>
                <th>Número de contactos</th>
                <th>Gráfica</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $fila = $resultado->num_rows;
            for ($i = 0; $i < $fila; $i++) {
                $resultado->data_seek($i);
                $fila_data = $resultado->fetch_assoc();

                echo '<tr>';
                echo '<td>' . htmlspecialchars($fila_data['Codigo']) . '</td>';
                echo '<td>' . htmlspecialchars($fila_data['Nombre']) . '</td>';
                $contactos = intval($fila_data['contactos']);
                echo '<td>' . $contactos . '</td>';
                echo '<td>';
                for ($j = 0; $j < $contactos; $j++) {
                    echo '<div class="circulitos"></div>';
                }
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>

    <br>
    <a href="index">Volver a loguearse</a> |
    <a href="inicio.php">Añadir más contactos a <?php unset($_SESSION['incrementos']); echo htmlspecialchars($_SESSION['usuario']); ?></a>
</body>
</html>