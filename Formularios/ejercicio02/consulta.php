<?php 
if(isset($_POST["edad"])){
    $edad = intval($_POST["edad"]);
    switch ($_POST["edad"]){
        case '14':
            echo 'eres una personita';
            break;
        case '15-20':
            echo 'todavía eres muy joven';
            break;
        case '21-40':
            echo 'eres una persona joven';
            break;
        case '41-60':
            echo 'eres una persona madura';
            break;
        case '61+':
            echo 'Ya eres una persona mayor';
            break;
        }
    
}else{
    echo 'Aún no me has dicho tu edad';
}

?>