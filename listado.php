<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de insulina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table {
            table-layout: fixed;
            width: 100%; /* Ajusta este valor según el tamaño que desees */
        }
        th, td {
            padding: 3px 8px; /* Reduzco el relleno de las celdas */
            text-align: center;
            font-size: 10px; /* Tamaño de fuente más pequeño */
        }
        th {
            word-wrap: break-word; /* Asegura que los textos largos en los encabezados se ajusten */
            font-weight: bold;
        }
    
        .table-tertiary th {
            word-wrap: break-word; /* Asegura que las palabras largas se ajusten correctamente */
            font-size: 10px; /* Tamaño de fuente más pequeño y más legible */
            padding: 5px 12px; /* Un poco más de espacio en las celdas */
            background-color: #f8f9fa; /* Color de fondo más suave */
        }
    
        .table-primary, .table-secondary, .table-tertiary {
            background-color: #f1f1f1; /* Fondo de color suave para las filas de encabezado */
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!--HEADER-->
            <div class="col-8">
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Diabetes</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Inserta datos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Elimina datos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Corrige datos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">Ver tabla de registros</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">Consulta estadísticas</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Tabla reorganizada con grupos por comida -->
        <div class="row">
            <table class="table table-bordered text-center">
                <thead class="table-primary">
                    <tr>
                        <th rowspan="2">DÍA</th>
                        <th colspan="9">DESAYUNO</th>
                        <th colspan="9">APERITIVO</th>
                        <th colspan="9">COMIDA</th>
                        <th colspan="9">MERIENDA</th>
                        <th colspan="9">CENA</th>
                        <th rowspan="2">AA</th>
                        <th rowspan="2">LENTA</th>
                    </tr>
                    <tr class="table-secondary">
                        <th colspan="4"></th>
                        <th colspan="2">HIPO</th>
                        <th colspan="3">HIPER</th>

                        <th colspan="4"></th>
                        <th colspan="2">HIPO</th>
                        <th colspan="3">HIPER</th>

                        <th colspan="4"></th>
                        <th colspan="2">HIPO</th>
                        <th colspan="3">HIPER</th>

                        <th colspan="4"></th>
                        <th colspan="2">HIPO</th>
                        <th colspan="3">HIPER</th>

                        <th colspan="4"></th>
                        <th colspan="2">HIPO</th>
                        <th colspan="3">HIPER</th>
                    </tr>
                    <tr class="table-tertiary">
                        <th></th>
                        <th>GL/1H</th><th>RAC.</th><th>INSU.</th><th>GL/2H</th>
                        <th>GLU.</th><th>HORA</th><th>GLU.</th><th>HORA</th><th>CORR.</th>

                        <th>GL/1H</th><th>RAC.</th><th>INSU.</th><th>GL/2H</th>
                        <th>GLU.</th><th>HORA</th><th>GLU.</th><th>HORA</th><th>CORR.</th>

                        <th>GL/1H</th><th>RAC.</th><th>INSU.</th><th>GL/2H</th>
                        <th>GLU.</th><th>HORA</th><th>GLU.</th><th>HORA</th><th>CORR.</th>

                        <th>GL/1H</th><th>RAC.</th><th>INSU.</th><th>GL/2H</th>
                        <th>GLU.</th><th>HORA</th><th>GLU.</th><th>HORA</th><th>CORR.</th>

                        <th>GL/1H</th><th>RAC.</th><th>INSU.</th><th>GL/2H</th>
                        <th>GLU.</th><th>HORA</th><th>GLU.</th><th>HORA</th><th>CORR.</th>

                        <th>AA</th><th>LENTA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Generar datos de ejemplo para 100 días
                    $registros = [];
                    for ($i = 1; $i <= 100; $i++) {
                        $registros[] = [
                            'dia' => $i,
                            'desayuno' => [rand(70, 130), rand(1, 5), rand(0, 10), rand(70, 130)],
                            'aperitivo' => [rand(70, 130), rand(1, 5), rand(0, 10), rand(70, 130)],
                            'comida' => [rand(70, 130), rand(1, 5), rand(0, 10), rand(70, 130)],
                            'merienda' => [rand(70, 130), rand(1, 5), rand(0, 10), rand(70, 130)],
                            'cena' => [rand(70, 130), rand(1, 5), rand(0, 10), rand(70, 130)],
                            'aa' => rand(0, 10),
                            'lenta' => rand(0, 10)
                        ];
                    }

                    // Mostrar los registros en la tabla
                    foreach ($registros as $registro) {
                        echo "<tr>";
                        echo "<td>{$registro['dia']}</td>";
                        foreach (['desayuno', 'aperitivo', 'comida', 'merienda', 'cena'] as $comida) {
                            echo "<td>{$registro[$comida][0]}</td><td>{$registro[$comida][1]}</td><td>{$registro[$comida][2]}</td><td>{$registro[$comida][3]}</td>";
                            echo "<td>{$registro[$comida][0]}</td><td>{$registro[$comida][1]}</td><td>{$registro[$comida][2]}</td><td>{$registro[$comida][3]}</td><td>{$registro[$comida][2]}</td>";
                        }
                        echo "<td>{$registro['aa']}</td><td>{$registro['lenta']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>