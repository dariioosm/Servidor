<?php 
$user='pepito';
$passwd='123';

//TODO validacion de la entrada de datos con el registro guardado
if(isset($_POST['user']) && isset($_POST['pass'])){
    echo'User & Pass exist';
}else{
    echo'combinacion fallida';
}
?>