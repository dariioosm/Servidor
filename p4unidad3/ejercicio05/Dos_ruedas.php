<?php 
class Dos_ruedas extends Vehiculo{
    public $cilindrada;

    //TODO hacer funcional poner_gasolina $litros = 1kg -> aumenta peso vehiculo

    public function poner_gasolina($litros){
        $this -> peso=$this -> peso + $litros; 
    }
}

?>