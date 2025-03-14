<?php
    require "conexion.php";

    $sqlpersonas = "SELECT * from personas";
    $stmtpersonas = $pdo->prepare($sqlpersonas);
    $stmtpersonas->execute();
    $personas = $stmtpersonas->fetchAll(PDO::FETCH_ASSOC);

    $sqlimagenes = "SELECT * from imagenes";
    $stmtimagenes = $pdo->prepare($sqlimagenes);
    $stmtimagenes->execute();
    $imagenes = $stmtimagenes->fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $idpersona = $_POST['persona'];  
        $idimagen = $_POST['idimagen'];  

        $sqlinsert = "INSERT INTO eventos (fecha, hora, idpersona, idimagen) VALUES (?, ?, ?, ?)";
        $stmtinsert = $pdo->prepare($sqlinsert);

        if ($stmtinsert->execute([$fecha, $hora, $idpersona, $idimagen])) {
            echo "
                <script>
                    alert('Entrada añadida');
                    window.location.href='nuevaagenda.php';
                </script>";
        } else {
            echo "
                <script>
                    alert('Entrada errónea');
                    window.location.href='nuevaagenda.php';
                </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Registro</title>
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
    <h2 class="text-center mb-4">Añade un registro</h2>
    <form action="#" method="post">
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha:</label>
            <input type="date" name="fecha" id="fecha" class="form-label" required>
        </div>
        <div class="mb-3">
            <label for="hora" class="form-label">Hora:</label>
            <input type="time" name="hora" id="hora" class="form-label">
        </div>
        <div class="mb-3">
            <label for="persona" class="form-label">Nombre:</label>
            <select name="persona" id="persona" class="form-control" required>
                <?php foreach ($personas as $persona): ?>
                    <option value="<?php echo $persona['idpersona']; ?>">
                        <?php echo htmlspecialchars($persona['nombre']); ?> <?php echo htmlspecialchars($persona['apellidos']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <h4>Selecciona imagen</h4>
        <div class="row">
            <?php foreach ($imagenes as $imagen): ?>
                <div class="col-md-3 col-sm-4 gl-6 pictograma">
                    <label>
                        <img src="<?php echo $imagen['imagen']; ?>" alt="<?php echo $imagen['descripcion']; ?>">
                        <input type="radio" name="idimagen" value="<?php echo $imagen['idimagen']; ?>" required>
                    </label>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Añadir Registro</button>
        </div>
    </form>
</div>

</body>
</html>
