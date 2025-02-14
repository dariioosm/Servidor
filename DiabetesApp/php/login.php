<?php

require 'conexion.php';

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
                //TODO hacer comprobacion de la combinacion de login y passwd correcta 
                
                
                
                $_SESSION['usuario']=$user;
                header('Location: home.php');
                exit();
            }
        }
    }


?>