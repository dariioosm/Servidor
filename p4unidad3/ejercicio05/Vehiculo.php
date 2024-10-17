<?php
class Vehiculo{
    public $color;
    public $peso;

    //TODO poner getter y setter de los atributos
    public function setColor($color){
        $this->color = $color;
    }

    public function getColor(){
        return $this -> color;
    }
    public function setPeso($peso){
        $this->peso = $peso;
    }

    
    public function getPeso(){
        return $this -> peso;
    }

    //TODO  constructor en la clase vehiculo  que pase color y peso

    public function __construct($peso,$color)
    {
        $this->color=$color;
        $this->peso=$peso;
    }

    public function circula(){
        echo 'el vehiculo circula <br>';
    }

    public function annadir_persona($peso_persona){
        $this -> peso = $this->peso + $peso_persona;
        return 'Se annadio una persona';
    }
    
    
    //TODO metodo toString para sacar info del objeto

    public function __toString()
    {
        return 'Peso y color: '.$this->peso.' '.$this->color;
    }
}

?>