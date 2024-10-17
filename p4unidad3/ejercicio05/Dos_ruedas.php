<?php 
require('Vehiculo.php');    
class Dos_ruedas extends Vehiculo{
    public $cilindrada;
    public $casco;

    //TODO hacer funcional poner_gasolina $litros = 1kg -> aumenta peso vehiculo

    public function poner_gasolina($litros){
        $this -> peso=$this -> peso + $litros; 
    }

    //TODO definir metodo añadir persona y sumar peso de la persona + 2kg por casco

    public function annadir_persona($num_personas)
    {
        $this->Vehiculo[];
    }
}

?>