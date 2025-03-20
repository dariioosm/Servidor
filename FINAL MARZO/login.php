<?php 
require 'conexion.php';

function autenticarUsuario($usario,$pass){
    global $conn;
    $existeuser = $conn-> prepare('SELECT usuario from usuarios where usuario = ?');
    $existeuser-> bind_param('s',$_SESSION['user']);
    $resultado = $existeuser -> get_result();
    if($resultado ->num_rows<1){
        'Este nombre de usuario no existe <a href="./index.php">Vuelve al index</a>';
    }else{
        //TODO comprobar la contraseña de formulario con la de la bd
        $existepass = $conn -> prepare('SELECT pass,id from usuarios where usuario = ?');
        $existepass ->bind_param('s',$_SESSION['user'],$_SESSION['pass']);
        $existepass -> execute();
        $existepass ->bind_result($pass,$id_usuario);
        if($existepass->fetch()){
            //TODO comprobar rol de usuario director
            $esdirector= $conn -> prepare('SELECT usuario from usuarios where id = ? && rol like director');
            $esdirector -> bind_param('i',$id_usuario);
            $esdirector -> execute();
            $esdirector -> bind_result($esdirector);

            $esalumno = $conn -> prepare('SELECT usuario from usuarios where id = ? && rol like alumno');

            if($esdirector->fetch()){

                header('Location: ./resultado_alumno.php');
            }
            if($esalumno -> fetch()){
                header('Location: ./insertar_notas.php');
            }
        }
    }
    

}








if($_SERVER["REQUEST_METHOD"]=="POST"){
    session_start();
    $_SESSION['user'] = $_POST['usuario'];
    $_SESSION['pass']=$_POST['pass'];
    
    //TODO comprobacion del usuario en la bbdd

  


}