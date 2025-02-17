 <!--? form logueo-->

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Inicio</title>
</head>
<body>
  <!--//? formulario de logueo-->
  <div class="container-fluid">
        <div class="row">
            <div class="col-12 text">
                <h2>Gestiona todos tus indices de glucosa desde un solo lugar</h2>
            </div>
            <div class="mt-4 ms-3 col-4 border border-primary-subtle rounded">
                <form method="post" action="./php/login.php">
                    <div class="mb-3">
                      <label for="login" class="form-label">Nombre de usuario</label>
                      <input type="text" class="form-control" id="usuario" name="usuario">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password" class="form-control" id="pass" name="pass">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <a href="./pages/altausuario.php" class=" btn btn-success" role="button">Registrate aqui</a>
                        </div>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</body>
</html>