<?php
//TODO conexion a bbdd

$hn = 'localhost';
$db = 'pictogramasphp';
$un = 'root';
$pw = '';

$conn = new mysqli($hn, $un, $pw, $db);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="#" method="post">
        <h2>Añadir datos a la agenda</h2>
        <label for="">Fecha <input type="date" name="fecha" id=""></label> <br>
        <label for="">Hora <input type="time" name="hora" id=""></label> <br>
        <label for="">Persona <input type="text" name="persona" id=""></label> <br>

        <h2>Selecciona una imagen</h2>
    <table>
        <?php
            for($i=0; $i<5; $i++){
                echo'<td>';
                for($j=0;$j<=$i;$j++){
                    echo '<td>'. .'</td>';
                }
                echo '</td>';
            }
        
        ?>
        <button type="submit">Añadir entrada en agenda</button>
        <?php echo '' ?>
    </table>
    
    </form>
</body>
</html>