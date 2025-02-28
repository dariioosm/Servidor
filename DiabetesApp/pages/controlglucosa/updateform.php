<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

   <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 border border-primary-subtle rounded p-4">
                <h3 class="text-center">Seleccionar Fecha de Registro</h3>
                <form action="../../php/controlglucosa/update.php" method="post">
                    <div class="mb-3">
                        <label for="fecha_control" class="form-label">Fecha de control</label>
                        <input type="date" name="fecha_control" id="fecha_control" class="form-control" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Buscar Registro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>