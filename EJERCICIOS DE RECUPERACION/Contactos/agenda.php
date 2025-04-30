<?php
require 'conexion.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    for ($i = 1; $i <= $_SESSION['incrementos']; $i++) {
        $nombre = $_POST['Nombre' . $i];
        $email = $_POST['email' . $i];
        $numero = $_POST['numero' . $i];

        if (!empty($nombre) || !empty($email) || !empty($numero)) {
            $select = $conn->prepare('SELECT Codigo FROM usuarios WHERE Nombre = ?');
            $select->bind_param('s', $_SESSION['usuario']);
            $select->execute();
            $resultado = $select->get_result();

            if ($fila = $resultado->fetch_assoc()) {
                $final_codigo = $fila['Codigo'];

                $inserta = $conn->prepare('INSERT INTO contactos (nombre, email, telefono, codusuario) VALUES (?, ?, ?, ?)');
                $inserta->bind_param('ssii', $nombre, $email, $numero, $final_codigo);

                if ($inserta->execute()) {
                } else {
                    echo "Error al insertar contacto: " . $inserta->error;
                }
            } else {
                echo "Usuario no encontrado en la base de datos.";
            }
        }
    }

    // Redirigir al final, después de guardar todos los contactos
    header('Location: grabado.php');
    exit;
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
for ($i = 1; $i <= $_SESSION['incrementos']; $i++) {
    echo "
        <p>Contacto $i</p>
        <label>Nombre $i</label> <input type='text' name='Nombre$i' /><br>
        <label>Email $i</label> <input type='email' name='email$i' /><br>
        <label>Teléfono $i</label> <input type='tel' name='numero$i' /><br><br>
    ";
}
?>

    <button type="submit">GRABAR</button>
</form>
    
</body>
</html>