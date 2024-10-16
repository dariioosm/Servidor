<?php
class Vehiculo{
    protected $color;
    protected $peso;

    //TODO poner getter y setter de los atributos
    protected function setColor($color){
        $this->color = $color;
    }

    protected function getColor(){
        return $this -> color;
    }
    protected function setPeso($peso){
        $this->peso = $peso;
    }

    
    protected function getPeso(){
        return $this -> peso;
    }

    //TODO  constructor en la clase vehiculo  que pase color y peso

    protected function __construct($color,$peso)
    {
        $this->color=$color;
        $this->peso=$peso;
    }

    protected function circula(){
        echo 'el vehiculo circula <br>';
    }

    protected function annadir_persona($peso_persona){
        $this ->peso = $this->peso + $peso_persona;
    }
    
    
    //TODO metodo toString para sacar info del objeto

    public function __toString()
    {
        return 'Peso y color: '.$this->peso.''.$this->color;
    }
}

?>