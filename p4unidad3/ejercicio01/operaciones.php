<?php
class Operaciones{
    public $numero1;
    public $numero2;
    public function suma($numero1,$numero2){
        $resultado=$numero1+$numero2;
        return 'El resultado de la suma es: '.$resultado;
    }
    public function resta($numero1,$numero2){
        $resultado=$numero1-$numero2;
        return 'El resultado de la suma es: '.$resultado;
    }
    public function multiplicacion($numero1,$numero2){
        $resultado=$numero1*$numero2;
        return 'El resultado de la suma es: '.$resultado;
    }
    public function division($numero1,$numero2){
        $resultado=$numero1/$numero2;
        return 'El resultado de la suma es: '.$resultado;
    }
}



$operar= new operaciones(20,50);
//echo $operar."<br>";
echo $operar -> suma(20,50)."<br>";
echo $operar-> resta(20,50)."<br>";
echo $operar-> multiplicacion(20,50)."<br>";
echo $operar-> division(20,50)."<br>";

?>