<?php 
class Coche extends Cuatro_ruedas{
    public $numero_cadenas_nieve;
    public function annadir_cadenas_nieve($num){
        $this -> numero_cadenas_nieve = $this -> numero_cadenas_nieve +$num; 

    }
    public function quitar_cadenas_nieve($num){
        $this -> numero_cadenas_nieve = $this -> numero_cadenas_nieve -$num;
    }
}


?>