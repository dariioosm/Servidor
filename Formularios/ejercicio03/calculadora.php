<?php

if(isset($_POST['A'])&&isset($_POST['B'])){
    $a=$_POST['A'];
    $b=$_POST['B'];
    $resultado='';
    if(isset($_POST['Suma'])){
        $resultado = $a+$b;
        echo 'El resultado de la division es:'.$resultado;
    }if(isset($_POST['Resta'])){
        $resultado = $a-$b;
        echo 'El resultado de la resta es:'.$resultado;
    }if(isset($_POST['Multi'])){
        $resultado = $a*$b;
        echo 'El resultado de la multiplicacion es:'.$resultado;
    }if(isset($_POST['Divi'])){
        $resultado = $a/$b;
        echo 'El resultado de la division es:'. $resultado;
    }
}



?>