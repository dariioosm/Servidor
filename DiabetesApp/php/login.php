<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container-fluid">
<!--Formulario de login-->
        <div class="row">
            <div class="col-4 mt-2 border border-primary-subtle rounded">
                <form action="#" method="post">
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
                </div>
                </form>
            </div>
        </div>

    </div>
</body>
</html>

<?php
    //TODO conexion a bbdd

$conn= new mysqli('localhost','root','','diabetesdb');

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

//TODO pillar datos de formulario
    if(isset($_POST)){
        $user=$_POST['usuario'];
        $pass=$_POST['pass'];

        //TODO comprobacion de cumplimentacion de datos
        if(empty($user)||empty($pass)){
            echo 'Faltan datos por rellenar';
        }else{
            //TODO hacer comprobacion inversa (comprobar si no existe en bbdd)
            $existeuser =$conn -> prepare('SELECT * FROM usuarios where login=?');
            $existeuser->bind_param('s',$user);
            $existeuser ->execute();
            $resultado=$existeuser->get_result();
            if($resultado ->num_rows <1){
                echo 'Este nombre de usuario no existe <a href="../index.php">registrate  aqui </a>';
            }else{
                
            }
        }
    }


?>