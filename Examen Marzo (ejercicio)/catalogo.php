<?php
require "conexion.php";

// Obtener las imágenes de la base de datos
$sql = "SELECT * FROM imagenes";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$imagenes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Pictogramas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style> 
        .container {
            margin-top: 20px;
        }

        .pictograma {
            text-align: center;
            margin-bottom: 20px;
        }

        .pictograma img {
            width: 120px;
            height: 120px;
            object-fit: contain;
        }

        .pictograma p {
            margin: 5px 0;
            font-size: 16px;
            font-weight: bold;
        }

        .ruta {
            font-size: 12px;
            color: gray;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Listado Pictogramas</h2>

        <div class="row">
            <?php foreach($imagenes as $imagen): ?>
                <div class="col-md-3 col-sm-4 col-6 pictograma">
                    <img src="<?= htmlspecialchars($imagen["imagen"]) ?>" alt="<?= htmlspecialchars($imagen["descripcion"]) ?>">
                    <p><?= htmlspecialchars($imagen["descripcion"]) ?></p>
                    <div class="ruta">
                        imagenes/<?= htmlspecialchars($imagen["imagen"]) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>