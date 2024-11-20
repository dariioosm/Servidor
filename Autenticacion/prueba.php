<?php 
$user='pepito';
$passwd='123';

//TODO validacion de la entrada de datos con el registro guardado
if($_POST['user']==$user && $_POST['pass']==$passwd){
    echo'User & Pass exist';
}else{
    echo'combinacion fallida';
}
?>
