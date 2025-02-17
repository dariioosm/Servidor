<?php

require 'conexion.php';

//TODO pillar datos de formulario
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user=$_POST['usuario'];
        $pass=$_POST['pass'];

        //TODO comprobacion de cumplimentacion de datos
        if(empty($user)||empty($pass)){
            echo 'Faltan datos por rellenar';
        }else{

            //TODO hacer comprobacion inversa (comprobar si no existe en bbdd)
            $existeuser =$conn -> prepare('SELECT login, pass FROM usuarios WHERE login = ?');
            $existeuser->bind_param('s',$user);
            $existeuser ->execute();
            $resultado=$existeuser->get_result();
                       

            if($resultado ->num_rows <1){
                echo 'Este nombre de usuario no existe <a href="../index.php">registrate  aqui </a>';
            }else{ 
                
                $hash_pass = $usuario['pass']; //* Contraseña hash
                //TODO metodo para hacer hash a la contraseña 
                password_hash($hash_pass,PASSWORD_DEFAULT);
                



                $usuario = $resultado->fetch_assoc();//* Obtener la contraseña encriptada desde la base de datos
                

        //TODO Comparar la contraseña ingresada con la almacenada (usando password_verify)
        if (password_verify($pass, $hash_db)) {
            $_SESSION['usuario'] = $user;
            header('Location:../pages/insertadatos.html');
            exit();
        } else {
            echo "Usuario o contraseña incorrectos.";
        }
            }
        }
    }
?>