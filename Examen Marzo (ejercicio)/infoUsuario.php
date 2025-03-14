<?php
require "conexion.php"; // Asegúrate de que este archivo esté correctamente configurado para la conexión a la base de datos

// Obtener todas las personas para el formulario
$sqlPersonas = "SELECT * FROM personas";
$stmtPersonas = $pdo->prepare($sqlPersonas);
$stmtPersonas->execute();
$personas = $stmtPersonas->fetchAll(PDO::FETCH_ASSOC);

// Si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fechaSeleccionada = $_POST['fecha'];
    $idPersonaSeleccionada = $_POST['id_persona'];

    // Consulta para obtener la agenda de la persona en la fecha seleccionada
    $sqlAgenda = "SELECT a.fecha, a.hora, i.imagen, i.descripcion 
                  FROM agenda a 
                  JOIN imagenes i ON a.idimagen = i.idimagen 
                  WHERE a.fecha = ? AND a.idpersona = ?";
    $stmtAgenda = $pdo->prepare($sqlAgenda);
    $stmtAgenda->execute([$fechaSeleccionada, $idPersonaSeleccionada]);
    $agenda = $stmtAgenda->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda del Día</title>
    <style>
        .contenedor {
            margin: 20px;
        }
        .agenda {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            text-align: center;
        }
        .pictograma img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <h1>Mostrar Agenda de un Día Seleccionado</h1>
        <form method="POST" action="">
            <div>
                <label for="id_persona">Seleccionar Persona:</label>
                <select id="id_persona" name="id_persona" required>
                    <?php foreach ($personas as $persona): ?>
                        <option value="<?= $persona['idpersona'] ?>">
                            <?= htmlspecialchars($persona['nombre'] . ' ' . $persona['apellidos']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="fecha">Seleccionar Fecha:</label>
                <input type="date" id="fecha" name="fecha" required>
            </div>
            <button type="submit">Mostrar Agenda</button>
        </form>

        <?php if (isset($agenda) && count($agenda) > 0): ?>
            <h2>Agenda para el <?= htmlspecialchars($fechaSeleccionada) ?>:</h2>
            <div class="agenda">
                <?php foreach ($agenda as $item): ?>
                    <div class="pictograma">
                        <img src="<?= htmlspecialchars($item['imagen']); ?>" alt="<?= htmlspecialchars($item['descripcion']); ?>">
                        <p>Hora: <?= htmlspecialchars($item['hora']); ?></p>
                        <p><?= htmlspecialchars($item['descripcion']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php elseif (isset($agenda)): ?>
            <h2>No hay agenda para esta fecha y persona.</h2>
        <?php endif; ?>
    </div>
</body>
</html>