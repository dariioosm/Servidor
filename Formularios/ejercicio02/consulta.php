<?php 
switch ($_POST['name']){
    case '14':
        echo 'eres una personita';
        break;
    case '15':
        echo 'todavía eres muy joven';
        break;
    case '21':
        echo 'eres una persona joven';
        break;
    case '41':
        echo 'eres una persona madura';
        break;
    case '61':
        echo 'Ya eres una persona mayor';
        break;
    default:
        echo 'Aún no me has dicho tu edad';
    }

?>