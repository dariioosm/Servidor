<?php
require_once('Cuatro_ruedas.php');
class Camion extends Cuatro_ruedas{
    public $longitud;

    //TODO getter/setter de longitud

    public function setLongitud($longitud){
        $this->longitud;
    }
    
    public function getLongitud(){
        return $this -> longitud;
    }


    //TODO  hacer que el metodo remolque modifique la longitud del camion
    public function annadir_remolque($longitud_remolque){
        $this->longitud = $this->longitud +$longitud_remolque; 
    }
}


?>