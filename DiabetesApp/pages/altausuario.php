<?php
//?guarda fecha en la variable para marcar limite en el registro
$fecha_hoy=date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
  <!--? formulario de registro-->
  <div class="container-fluid">
      <div class="row">
              <div class="mt-4 ms-3 col-6 border border-primary-subtle rounded">
                  <form method="post" action="../php/registro.php">
                      <div class="row">
                          <div class="mb-3 col-6">
                              <label for="login" class="form-label">Nombre</label>
                              <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                          <div class="mb-3 col-6">
                              <label for="login" class="form-label">Apellidos</label>
                              <input type="text" class="form-control" id="apellidos" name="apellidos">
                            </div>
                      </div>
                      <div class="row">
                          <div class="mb-3 col-6 align-conten left">
                              <label for="login" class="form-label">Fecha de nacimiento</label>
                              <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" max="<?= $fecha_hoy;?>"">
                            </div>  
                          <div class="mb-3 col-6">
                            <label for="login" class="form-label">Nombre de usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario">
                          </div>
                      </div>
                        <div class="row">
                          <div class="mb-3 col-6">
                              <label for="exampleInputPassword1" class="form-label">Constraseña</label>
                              <input type="password" class="form-control" id="pass" name="pass">
                            </div>
                            <div class="mb-3 col-6">
                                <label for="exampleInputPassword1" class="form-label">Confirmacion de contraseña</label>
                                <input type="password" class="form-control" id="pass2" name="pass2">
                              </div>
                        </div>
                      <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
              </div>
      </div>
  </div>
</body>
</html>