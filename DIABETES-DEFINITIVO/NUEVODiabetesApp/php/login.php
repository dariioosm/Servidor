<?php
//? hace llamada con la ruta absoluta al archivo, para que no hay problema en futuras llamadas
require_once __DIR__ . '/conexion.php';
require_once __DIR__ . '/controlglucosa/select.php';
session_destroy();
session_start();
//TODO pillar datos de formulario
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user=trim($_POST['usuario']);
        $pass=trim($_POST['pass']);
        $fecha_hoy= date("Y-m-d");

        //TODO comprobacion de cumplimentacion de datos
        if(empty($user)||empty($pass)){
            echo 'Faltan datos por rellenar';
        }else{

            //TODO hacer comprobacion inversa (comprobar si no existe en bbdd)
            $existeuser =$conn -> prepare('SELECT login FROM usuarios WHERE login = ?');
            $existeuser->bind_param('s',$user);
            $existeuser ->execute();
            $resultado=$existeuser->get_result();
                       

            if($resultado ->num_rows <1){
                echo 'Este nombre de usuario no existe <a href="../index.php">registrate  aqui </a>';
               
            }else{ 
                 //* Contraseña hash
                //TODO metodo para hacer hash a la contraseña 
                $existepass = $conn ->prepare('SELECT pass,id_usuario from usuarios where login LIKE ?');
                $existepass ->bind_param('s',$user);
                $existepass ->execute();
                $existepass -> bind_result($hash,$id_usuario);
                

        //TODO Comparar la contraseña ingresada con la almacenada (usando password_verify)
        if ($existepass->fetch() && password_verify($pass,$hash)) {
           $existepass->close();
           //? guaradarlo en session para poder cogerlo en otros metodos
            comprobarControl($id_usuario,$fecha_hoy);
            header('Location: ../pages/panel.php');
            exit;
        } else {
            echo "Usuario o contraseña incorrectos.";
        }
            }
        }
    }
?>