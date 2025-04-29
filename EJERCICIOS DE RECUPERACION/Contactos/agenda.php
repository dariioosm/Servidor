<?php
require 'conexion.php';
session_start();
var_dump($_SESSION['incrementos']);

//? Recorrer los contactos enviados
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    for ($i = 1; $i <= $_SESSION['incrementos']; $i++) {
        $nombre = $_POST['Nombre'][$i];
        $email = $_POST['email'][$i];
        $numero = $_POST['numero'][$i];

        if (!empty($nombre) || !empty($email) || !empty($numero)) {
            var_dump($_POST);
            $inserta = $conn->prepare('INSERT INTO contactos (nombre, email, telefono, codusuario) VALUES (?, ?, ?, ?)');
            $inserta->bind_param('ssii', $nombre, $email, $numero, $final_codigo);
            $inserta->execute();
        }
    }
   // unset($_SESSION['incrementos']);

    header('Location: grabado.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hola <?php echo htmlspecialchars($_SESSION['usuario']); ?> </h1>
    
    <form action="" method="post">
        
    
    <?php
    
        for($i=1; $i<=$_SESSION['incrementos'];$i++){
         echo"
            <p>Contacto $i</p>
            <label>Nombre $i</label> <input type='text' name='Nombre[$i]' /><br>
            <label>Email $i</label> <input type='email' name='email[$i]' /><br>
            <label>Teléfono $i</label> <input type='tel' name='numero[$i]' /><br><br>
            ";
        }
    
    ?>
    <button type="submit">GRABAR</button>
</form>
    
</body>
</html>