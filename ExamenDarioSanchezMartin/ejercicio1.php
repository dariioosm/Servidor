<?php
//TODO conexion a bbdd

$hn = 'localhost';
$db = 'pictogramasphp';
$un = 'root';
$pw = '';

$conn = new mysqli($hn, $un, $pw, $db);


//TODO hacer consulta de las imagenes a bbdd

$sql= 'SELECT idimagen , COUNT(*) AS numeroimagenes FROM imagenes';
$imagenes = $conn->query($sql);



//$numeroimagenes = $conn -> prepare('SELECT idimagen , COUNT (idimagen) as numero FROM imagenes ');
//$numeroimagenes -> execute();
//$total = $numeroimagenes ->get_result();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listado Pictogramas</h1>
     <form method="post" action="#">

        
    </form>
    <table>
        <?php 
            $filas = $imagenes ->num_rows;
            for($j=0;$j<$filas;$j++){
                echo "<tr>";
                //$resultado->data_seek($j);
               // echo '<td>'.'<img src= '$imagenes->fetch_assoc()['imagen']'/>' .'</td>';
                echo  $imagenes;
            };
            echo '</tr>';
        ?>
    </table>
</body>
</html>