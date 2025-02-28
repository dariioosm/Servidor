<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Registro de Glucosa</title>
    <style>
        .custom-radio .form-check-input {
            background-color: #6c757d;
            border-color: #6c757d; 
        }
        .custom-radio .form-check-input:checked {
            background-color: #0d6efd;
            border-color: #0d6efd; 
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8 mx-auto border border-primary-subtle rounded p-4">
                <form action="../../php/comidas/delete.php" method="post">
                    <h3>Introduce los datos de la comida realizada</h3>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Fecha de control</label>
                            <input type="date" name="fecha_control" class="form-control">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Tipo de comida</label>
                            <select class="form-select" id="tipo_comida" name="tipo_comida">
                                <option selected>Elige el tipo de comida...</option>
                                <option value="Desayuno">Desayuno</option>
                                <option value="Aperitivo">Aperitivo</option>
                                <option value="Comida">Comida</option>
                                <option value="Merienda">Merienda</option>
                                <option value="Cena">Cena</option>
                            </select>
                        </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
