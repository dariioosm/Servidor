<?php
class Cuatro_ruedas extends Vehiculo{
    protected $numero_puertas;
    
    //TODO hacer funcional el metodo repintar

    public function repintar($color){
        $this -> color = $color;
        return 'El coche es de color '.$this->color;
    }
}

?>