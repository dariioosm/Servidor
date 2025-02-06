<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Inicio</title>
</head>
<body>
    <div class="container-fluid">
<!--Formulario de registro-->
        <div class="row">
            <div class="col-4 mt-2 border border-primary-subtle rounded">
                <form action="./php/registro.php" method="post">
                <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="" class="form-control">
                </div>
                <div class="mb-3">
                <label for="" class="form-label">Apellidos</label>
                <input type="text" name="apellidos" id="" class="form-control">
                </div>
                <div class="mb-3">
                <label for="" class="form-label">Fecha de nacimiento</label>
                <input type="date" name="fecha_nacimiento" id="" class="form-control">
                </div>
                <div class="mb-3">
                <label for="" class="form-label">Nombre de usuario</label>
                <input type="text" name="usuario" id="" class="form-control">
                </div>
                <div class="mb-3">
                <label for="" class="form-label">Contraseña</label>
                <input type="password" name="pass" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="submit">Enviar</button>
                    <a href="">¿Ya estas registrado?</a>
                </div>
                </form>
            </div>
        </div>

    </div>
</body>
</html>

<?php 



?>