<?php
class Cuatro_ruedas extends Vehiculo{
    public $numero_puertas;


    //TODO getter y setter del numero de puertas

    public function setPuertas($numero_puertas){
        $this->numero_puertas;
    }
    public function getPuertas(){
        return $this->numero_puertas;
    }
    
    //TODO hacer funcional el metodo repintar

    public function repintar($color){
        $this -> color = $color;
        return 'El coche es de color '.$this->color;
    }
}

?>