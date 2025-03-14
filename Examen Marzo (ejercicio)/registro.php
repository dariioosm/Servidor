<?php
require "conexion.php";

// Obtener datos de la tabla personas
$sqlPersonas = "SELECT * FROM personas";
$stmtPersonas = $pdo->prepare($sqlPersonas);
$stmtPersonas->execute();
$personas = $stmtPersonas->fetchAll(PDO::FETCH_ASSOC);

// Obtener datos de la tabla imagenes
$sqlImagenes = "SELECT * FROM imagenes";
$stmtImagenes = $pdo->prepare($sqlImagenes);
$stmtImagenes->execute();
$imagenes = $stmtImagenes->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $id_persona = $_POST["id_persona"];
    $id_imagen = $_POST["id_imagen"];

    $sqlInsert = "INSERT INTO agenda (fecha, hora, idpersona, idimagen) VALUES (?, ?, ?, ?)";
    $stmtInsert = $pdo->prepare($sqlInsert);
    if ($stmtInsert->execute([$fecha, $hora, $id_persona, $id_imagen])) {
        echo "<script>
                alert('Entrada añadida');
                window.location.href='registro.php';
              </script>";
    } else {
        echo "<script>
                alert('Error al añadir la entrada');
                window.location.href='registro.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style> 
        .container {
            margin-top: 20px;
        }

        .pictograma {
            text-align: center;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
        }

        .pictograma img {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }

        .pictograma input {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Añadir Datos En La Agenda</h2>
        <form method="POST" action="#">
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha :</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>

            <div class="mb-3">
                <label for="hora" class="form-label">Hora :</label>
                <input type="time" class="form-control" id="hora" name="hora" required>
            </div>

            <div class="mb-3">
                <label for="id_persona" class="form-label">Seleccionar Persona :</label>
                <select class="form-control" id="id_persona" name="id_persona" required>
                    <?php foreach ($personas as $persona): ?>
                        <option value="<?= $persona['idpersona'] ?>">
                            <?= htmlspecialchars($persona["nombre"]) ?> <?= htmlspecialchars($persona["apellidos"]) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <h4>Seleccionar Imagen</h4>
            <div class="row">
                <?php foreach ($imagenes as $imagen): ?>
                    <div class="col-md-3 col-sm-4 gl-6 pictograma">
                        <label>
                            <img src="<?= htmlspecialchars($imagen["imagen"]) ?>" alt="<?= htmlspecialchars($imagen['descripcion']) ?>">
                            <br>
                            <input type="radio" name="id_imagen" value="<?= $imagen['idimagen'] ?>" required>
                            <span><?= htmlspecialchars($imagen["descripcion"]) ?></span>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
            <button type="submit" class="btn btn-primary">Añadir entrada</button>
            <a href="catalogo.php" class="btn btn-secondary">Volver listado</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>