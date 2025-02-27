
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <label for="">Fecha<input type="date" name="fecha" id=""></label> <br>
        <label for="">Persona<input type="text" name="persona"></label> <br>
        <button type="submit">Mostrar Agenda</button>
    </form>
</body>
</html>



<?php
$hn = 'localhost';
$db = 'pictogramasphp';
$un = 'root';
$pw = '';

$conn = new mysqli($hn, $un, $pw, $db);


//TODO coger los datos del formulario

if(isset($_POST)){
$persona=$_POST['persona'];
$fecha = $_POST['fecha'];


//TODO selecciona el id del user para relacionarlo posteriormente en la tabla donde se encuentra la imagen
$select_user = $conn-> prepare("SELECT idpersona FROM  personas WHERE nombre LIKE ?");
$select_user ->bind_param('s',$persona);
$select_user ->execute();
$select_user -> bind_result($persona);
$select_user ->fetch();
$select_user->close();


$select_imagen = $conn -> prepare("SELECT idimagen FROM agenda WHERE idpersona LIKE ? AND fecha LIKE ?");
$select_imagen -> bind_param('ss',$persona,$fecha);
$select_imagen -> execute();
$select_imagen -> bind_result($id_imagen);
$select_imagen->fetch();
$select_imagen -> close();

echo" <img src='' />";


}
?>
