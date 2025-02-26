<?php 
require 'conexion.php';
if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fecha_control = $_POST['fecha_control'];
    $lenta = $_POST['lenta'];
    $indice_actividad = isset($_POST['indice_actividad']) ? 1 : 5;

    // Insert data
    if(isset($_POST['insert'])){
        $sql = 'INSERT INTO CONTROL_GLUCOSA (id_usuario, fecha_control, glucosa_lenta, indice_actividad) VALUES (?, ?, ?, ?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_SESSION['user_id'], $fecha_control, $lenta, $indice_actividad]);
    }
    
    // Update data
    elseif(isset($_POST['update'])){
        $sql = 'UPDATE CONTROL_GLUCOSA SET glucosa_lenta = ?, indice_actividad = ? WHERE id_usuario = ? AND fecha_control = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$lenta, $indice_actividad, $_SESSION['user_id'], $fecha_control]);
    }

    // Delete data
    if(isset($_POST['delete'])){
        $fecha_control = $_POST['delete'];
        $sql = 'DELETE FROM CONTROL_GLUCOSA WHERE id_usuario = ? AND fecha_control = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_SESSION['user_id'], $fecha_control]);
    }
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
    <h2>Gestion de control de glucosa</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="fecha_control">Fecha de control:</label>
        <input type="datetime-local" id="fecha_control" name="fecha_control" required>
        <label for="indice_actividad"> <input type="checkbox" name="indice_actividad"> Indice de Actividad</label>
        <input type="number" step='0.01' name="lenta" placeholder="Glucosa lenta" required>
        <button type="submit" name="insert">Agregar</button>
        <button type="submit" name='update'>Modificar</button>
    </form>

    <table>
        <tr>
            <th>Fecha</th>
            <th>Indice Actividad</th>
            <th>Insulina Lenta</th>
            <th>Acciones</th>
        </tr>
        <?php 
            $stmt = $pdo->prepare('SELECT * FROM CONTROL_GLUCOSA WHERE id_usuario = ?');
            $stmt->execute([$_SESSION['user_id']]);
            while ($row = $stmt->fetch()){
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['fecha_control']) . '</td>';
                echo '<td>' . ($row['indice_actividad']) . '</td>';
                echo '<td>' . htmlspecialchars($row['glucosa_lenta']) . '</td>';
                echo '<td><form method="POST" action=""><button type="submit" name="delete" value="' . htmlspecialchars($row['fecha_control']) . '">Eliminar</button></form></td>';
                echo '</tr>';
            }
        ?>
    </table>
</body>
</html>
