<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

   <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-4 mt-2 border border-primary-subtle rounded">
                <form action="../../php/controlglucosa/delete.php" method="post">
                    <h3>¿Que fecha de control quieres eliminar?</h3>
                <div class="mb-3">
                <label for="" class="form-label">Fecha de control</label>
                <input type="date" name="fecha_control" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="submit">Eliminar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>